<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Model;

use CMDBObjectSet;
use Combodo\iTop\Service\Events\EventData;
use DBObjectSearch;
use Dict;
use MetaModel;
use PhysicalDevice;

class _PatchPanel extends PhysicalDevice
{
    /**
     * Handle write event on PatchPanel
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnPatchPanelAfterWriteRequestedByCableMgmt(EventData $oEventData): void
    {
        $aEventData = $oEventData->GetEventData();
        if (!$aEventData['is_new']) {
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
    }

	/**
     * Compute value event on PatchPanel
     *
     * @param EventData $oEventData
     * @return void
     */
	public function OnPatchPanelComputeValuesRequestedByCableMgmt(EventData $oEventData): void
	{
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
     * Set attribute flags event on PatchPanel
     *
     * @param EventData $oEventData
     * @return void
     */
	public function OnPatchPanelSetAttributesFlagsRequestedByCableMgmt(EventData $oEventData): void
	{
        $this->AddAttributeFlags('free_sockets', OPT_ATT_READONLY);
        $this->AddAttributeFlags('ready_sockets', OPT_ATT_READONLY);
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
		if ($iNetworkSocketCount >= $iCapacity) {
			return Dict::S('UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoCapacity');
		}

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
            // For the case where the datamodel has been changed and org_id is a mandatory r/w attribute of the class NetworkSocket
            if (in_array('org_id', MetaModel::GetAttributesList('NetworkSocket')) && (MetaModel::GetAttributeFlags('NetworkSocket', '', 'org_id') & OPT_ATT_READONLY)) {
                $oNetworkSocket->Set('org_id', $this->Get('org_id'));
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
	public function CreateBackEndNetworkCables($iRemotePatchPanel, $iQuantity): string
	{
		// Get list of available local Network Sockets
		$iLocalPatchPanel = $this->GetKey();
		list ($iLocalCapacity, $oLocalNetworkSocketSet) = $this->GetNetworkSocketsWithFreeBackEnd($iLocalPatchPanel);
		if ($iLocalCapacity == 0) {
			return Dict::Format('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity', $this->Get('friendlyname'));
		} elseif ($iLocalCapacity < $iQuantity) {
			return Dict::Format('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NotEnoughCapacity', $this->Get('friendlyname'), $iLocalCapacity, $iQuantity);
		}

		// Get list of available remote network Sockets
		if (empty($iRemotePatchPanel)) {
			return Dict::Format('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelExists', $iRemotePatchPanel);
		}
		list ($iRemoteCapacity, $oRemoteNetworkSocketSet) = $this->GetNetworkSocketsWithFreeBackEnd($iRemotePatchPanel);
		if ($iRemoteCapacity == 0) {
			$oPatchPanel = MetaModel::GetObject('PatchPanel', $iRemotePatchPanel);
			return Dict::Format('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity', $oPatchPanel->Get('friendlyname'));
		}

		// Get parameters of breakout cable attached to both the local ($this) and remote patch panel, if any
		$iCableType = 0;
		$iCableCategory = $this->Get('cablecategory_id');
		$sLength = '';
		$sLabel = '';
		$sOQL = "SELECT BreakoutCable AS bc JOIN lnkBreakoutCableToPatchPanel AS l ON l.breakoutcable_id = bc.id WHERE l.patchpanel_id = :pp_id";
		$oBreakoutCableSet1 = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('pp_id' => $iLocalPatchPanel));
		$oBreakoutCableSet2 = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('pp_id' => $iRemotePatchPanel));
		$oBreakoutCableSet = $oBreakoutCableSet1->CreateIntersect($oBreakoutCableSet2);
		if ($oBreakoutCable = $oBreakoutCableSet->Fetch()) {
			$iCableType = $oBreakoutCable->Get('cabletype_id');
			$iCableCategory = $iCableCategory ?? $oBreakoutCable->Get('cablecategory_id');
			$sLength = $oBreakoutCable->Get('length');
			$sLabel = $oBreakoutCable->Get('label');
		}

		if ($iQuantity <= $iRemoteCapacity) {
			$oNetworkSocketSetSmall = $oLocalNetworkSocketSet;
			$oNetworkSocketSetBig = $oRemoteNetworkSocketSet;
		} else {
			$oNetworkSocketSetSmall = $oRemoteNetworkSocketSet;
			$oNetworkSocketSetBig = $oLocalNetworkSocketSet;
		}
		while (($oNetworkSocketOfSmall = $oNetworkSocketSetSmall->Fetch()) && ($iQuantity-- > 0)) {
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
