<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Model;

use CMDBObjectSet;
use DBObjectSearch;
use Dict;
use MetaModel;
use PhysicalDevice;

class _PatchPanel extends PhysicalDevice
{
	/**
	 * @inheritdoc
	 */
	protected function AfterUpdate(): void
	{
		$aChanges = $this->ListPreviousValuesForUpdatedAttributes();
		if (array_key_exists('name', $aChanges)) {
			// Propagate name change to impacted network socket
			$sOQL = "SELECT NetworkSocket WHERE patchpanel_id = :id";
			$oNetworkSocketSet =  new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id' => $this->GetKey()));
			while ($oNetworkSocket = $oNetworkSocketSet->Fetch()) {
				$oNetworkSocket->ComputeValues();
				$oNetworkSocket->DBUpdate();
			}
		}
	}

	/**
	 * @inheritdoc
	 */
	public function ComputeValues(): void
	{
		parent::ComputeValues();

		// Set capacities
		$iReadySockets = 0;
		$oNetworkSocketsSet = $this->Get('networksockets_list');
		$iFreeSockets = $this->Get('capacity') - $oNetworkSocketsSet->Count();
		while ($oNetworkSocket = $oNetworkSocketsSet->Fetch()) {
			$sStatus = $oNetworkSocket->Get('status');
			if ($sStatus == 'ready') {
				$iReadySockets++;
			}
			if ($sStatus != 'active') {
				$iFreeSockets++;
			}
		}
		$this->Set('free_sockets', $iFreeSockets);
		$this->Set('ready_sockets', $iReadySockets);
	}

	/**
	 * @inheritDoc
	 */
	public function GetInitialStateAttributeFlags($sAttCode, &$aReasons = array())
	{
		$sFlagsFromParent = parent::GetInitialStateAttributeFlags($sAttCode, $aReasons);

		switch ($sAttCode) {
			case 'free_sockets':
			case 'ready_sockets':
				return (OPT_ATT_READONLY | $sFlagsFromParent);

			default:
				break;
		}

		return $sFlagsFromParent;
	}

	/**
	 * @inheritDoc
	 */
	public function GetAttributeFlags($sAttCode, &$aReasons = array(), $sTargetState = '')
	{
		$sFlagsFromParent = parent::GetAttributeFlags($sAttCode, $aReasons, $sTargetState);

		switch ($sAttCode) {
			case 'free_sockets':
			case 'ready_sockets':
				return (OPT_ATT_READONLY | $sFlagsFromParent);

			default:
				break;
		}

		return $sFlagsFromParent;
	}

	/**
	 * Create all NetworkSockets of the PatchPanel
	 *
	 */
	public function CreateNetworkSockets(): string
	{
		$iLocationId = $this->Get('location_id');
		if ($iLocationId <= 0) {
			return 'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoLocationDefined';
		}

		$iCapacity = $this->Get('capacity');
		$oNetworkSocketSet = $this->Get('networksockets_list');
		$iNetworkSocketCount = $oNetworkSocketSet->Count();
		for ($i = $iNetworkSocketCount + 1; $i <= $iCapacity; $i++) {
			$oNetworkSocket = MetaModel::NewObject('NetworkSocket');
			$oNetworkSocket->Set('code', $oNetworkSocket->ComputeCode($i, $iCapacity));
			$oNetworkSocket->Set('status', 'inactive');
			$oNetworkSocket->Set('location_id', $iLocationId);
			$oNetworkSocket->Set('rack_id', $this->Get('rack_id'));
			$oNetworkSocket->Set('patchpanel_id', $this->GetKey());
			if (class_exists('InterfaceConnector')) {
				$oNetworkSocket->Set('interfaceconnector_id', $this->Get('interfaceconnector_id'));
			}
			$oNetworkSocket->DBInsert();
		}

		return '';
	}

	/**
	 * Get the count and set of NetworkSockets with free backend cables in the PatchPanel
	 *
	 */
	public function GetNetworkSocketsWithFreeBackEnd($iPatchPanel): array
	{
		if ($iPatchPanel <= 0) {
			return [0, null];
		}

		$oPatchPanel = MetaModel::GetObject('PatchPanel', $iPatchPanel);
		$iPatchPanelCapacity = $oPatchPanel->Get('capacity');
		if (empty($iPatchPanelCapacity)) {
			return [0, null];
		}

		$sOQL = "SELECT NetworkSocket AS ns WHERE ns.patchpanel_id = :pp_id AND ns.backendsocket_id = 0";
		$oNetworkSocketSet= new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('pp_id' => $iPatchPanel));
		$iCapacity = $oNetworkSocketSet->Count();

		return [$iCapacity, $oNetworkSocketSet];
	}

	/**
	 * Create Back End Cables between the NetworkSockets of the PatchPanel and the ones of a remote PatchPanel
	 *
	 */
	public function CreateBackEndNetworkCables($iRemotePatchPanel): string
	{
		// Get list of available remote network Sockets
		if (empty($iRemotePatchPanel)) {
			return Dict::Format('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelExists', $iRemotePatchPanel);
		}
		list ($iRemoteCapacity, $oRemoteNetworkSocketSet) = $this->GetNetworkSocketsWithFreeBackEnd($iRemotePatchPanel);
		if ($iRemoteCapacity == 0) {
			$oPatchPanel = MetaModel::GetObject('PatchPanel', $iRemotePatchPanel);
			return Dict::Format('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity', $oPatchPanel->Get('friendlyname'));
		}

		// Get list of available local Network Sockets
		$iLocalPatchPanel = $this->GetKey();
		list ($iLocalCapacity, $oLocalNetworkSocketSet) = $this->GetNetworkSocketsWithFreeBackEnd($iLocalPatchPanel);
		if ($iLocalCapacity == 0) {
			return Dict::Format('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity', $this->Get('friendlyname'));
		}

		// Get parameters of breakout cable attached to both the local ($this) and remote patch panel, if any
		$iCableType = 0;
		$iCableCategory = 0;
		$sLength = '';
		$sLabel = '';
		$sOQL = "SELECT BreakoutCable AS bc JOIN lnkBreakoutCableToPatchPanel AS l ON l.breakoutcable_id = bc.id WHERE l.patchpanel_id = :pp_id";
		$oBreakoutCableSet1 = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('pp_id' => $iLocalPatchPanel));
		$oBreakoutCableSet2 = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('pp_id' => $iRemotePatchPanel));
		$oBreakoutCableSet = $oBreakoutCableSet1->CreateIntersect($oBreakoutCableSet2);
		if ($oBreakoutCable = $oBreakoutCableSet->Fetch()) {
			$iCableType = $oBreakoutCable->Get('cabletype_id');
			$iCableCategory = $oBreakoutCable->Get('cablecategory_id');
			$sLength = $oBreakoutCable->Get('length');
			$sLabel = $oBreakoutCable->Get('label');
		}

		if ($iLocalCapacity <= $iRemoteCapacity) {
			$oNetworkSocketSetSmall = $oLocalNetworkSocketSet;
			$oNetworkSocketSetBig = $oRemoteNetworkSocketSet;
		} else {
			$oNetworkSocketSetSmall = $oRemoteNetworkSocketSet;
			$oNetworkSocketSetBig = $oLocalNetworkSocketSet;
		}
		while ($oNetworkSocketOfSmall = $oNetworkSocketSetSmall->Fetch()) {
			$oNetworkSocketOfBig = $oNetworkSocketSetBig->Fetch();
			$oNetworkSocketOfSmall->Set('backendsocket_id', $oNetworkSocketOfBig->GetKey());
			$oNetworkSocketOfSmall->DBUpdate();

			$oBackEndNetworkCable = MetaModel::NewObject('BackEndNetworkCable');
			$oBackEndNetworkCable->Set('backendsocket1_id', $oNetworkSocketOfSmall->GetKey());
			$oBackEndNetworkCable->Set('backendsocket2_id', $oNetworkSocketOfBig->GetKey());
			$oBackEndNetworkCable->Set('cabletype_id', $iCableType);
			$oBackEndNetworkCable->Set('cablecategory_id', $iCableCategory);
			$oBackEndNetworkCable->Set('length', $sLength);
			$oBackEndNetworkCable->Set('label', $sLabel);
			$oBackEndNetworkCable->DBInsert();
		}

		return '';
	}

}
