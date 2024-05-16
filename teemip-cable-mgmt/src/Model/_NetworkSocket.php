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
use NetworkInterface;

class _NetworkSocket extends NetworkInterface
{
	const DEFAULT_CHAR_DELIMITER = '/';

	/**
	 * @inheritdoc
	 */
	public function PrefillCreationForm(&$aContextParam)
	{
		$iPatchPanelId = $this->Get('patchpanel_id');
		if ($iPatchPanelId > 0) {
			$oPatchPanel = MetaModel::GetObject('PatchPanel', $iPatchPanelId, false);
			if ($oPatchPanel) {
				$this->Set('rack_id', $oPatchPanel->Get('rack_id'));
				$this->Set('location_id', $oPatchPanel->Get('location_id'));
			}
		}

		parent::PrefillCreationForm($aContextParam);
	}

	/**
	 * Compute the name that should be given to a NetworkSocket
	 *
	 */
	private function ComputeName(): string
	{
		$sDelimiter = ' '.static::DEFAULT_CHAR_DELIMITER.' ';
		$sLocationName = $this->Get('location_name');
		$iRackId = $this->Get('rack_id');
		if ($iRackId > 0) {
			$sRackName = $this->Get('rack_name');
			$iPatchPanelId = $this->Get('patchpanel_id');
			if ($iPatchPanelId > 0) {
				$sPatchPanelName = $this->Get('patchpanel_name');
				$sPosition = $sLocationName.$sDelimiter.$sRackName.$sDelimiter.$sPatchPanelName;
			} else {
				$sPosition = $sLocationName.$sDelimiter.$sRackName;
			}
		} else {
			$sPosition = $sLocationName;
		}
		$sName = $sPosition.$sDelimiter.$this->Get('code');
		return $sName;
	}

	/**
	 * Compute the status of the NetworkSocket
	 *
	 */
	private function ComputeStatus(): string
	{
		if ($this->Get('backendsocket_id') > 0) {
			if (($this->Get('networksocket_id') > 0) || ($this->Get('physicalinterface_id') > 0)) {
				return 'active';
			}

			$iCrossConnect = $this->Get('crossconnect_id');
			if ($iCrossConnect > 0) {
				$oCrossConnect = MetaModel::GetObject('CrossConnect', $iCrossConnect);
				if ($oCrossConnect && $oCrossConnect->IsActive()) {
					return 'active';
				}
			}

			return 'ready';
		}

		return 'inactive';
	}

	/**
	 * @inheritdoc
	 */
	public function ComputeValues(): void
	{
		parent::ComputeValues();

		// Set name
		$this->Set('name', $this->ComputeName());

		// Set status
		$this->Set('status', $this->ComputeStatus());
	}

	/**
	 * @inheritDoc
	 */
	public function GetInitialStateAttributeFlags($sAttCode, &$aReasons = array())
	{
		$sFlagsFromParent = parent::GetInitialStateAttributeFlags($sAttCode, $aReasons);

		switch ($sAttCode) {
			case 'status':
			case 'crossconnect_id':
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
			case 'status':
			case 'crossconnect_id':
				return (OPT_ATT_READONLY | $sFlagsFromParent);

			default:
				break;
		}

		return $sFlagsFromParent;
	}

	/**
	 * @inheritdoc
	 */
	public function DoCheckToWrite(): void
	{
		parent::DoCheckToWrite();

		// Patch panel must be selected if rack is selected
		$iRack = $this->Get('rack_id');
		if ($iRack > 0) {
			if ($this->Get('patchpanel_id') <= 0) {
				$this->m_aCheckIssues[] = Dict::S('UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel');
			}
		}

		// Network socket cannot be connected to both a remote network socket, a connectable CI or a Cross Connect
		$iConnectableCI = $this->Get('connectableci_id');
		$iRemoteNetworkSocket = $this->Get('networksocket_id');
		$CrossConnect = $this->Get('crossconnect_id');
		if (($iConnectableCI > 0) && ($iRemoteNetworkSocket > 0)) {
			$this->m_aCheckIssues[] = Dict::S('UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket');
		}
		if (($iConnectableCI > 0) && ($CrossConnect > 0)) {
			$this->m_aCheckIssues[] = Dict::S('UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndCrossConnect');
		}
		//if (($iRemoteNetworkSocket > 0) && ($CrossConnect > 0)) {
		//	$this->m_aCheckIssues[] = Dict::S('UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToSocketAndCrossConnect');
		//}
		if (($iRemoteNetworkSocket > 0) && ($this->Get('backendsocket_id') == $iRemoteNetworkSocket)) {
			$this->m_aCheckIssues[] = Dict::S('UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket');
		}
	}

	/**
	 * @inheritdoc
	 */
	protected function AfterInsert(): void
	{
		parent::AfterInsert();

		// Set network socket at remote physical interface
		if ($this->Get('physicalinterface_id') > 0) {
			$oPhysicalInterface = MetaModel::GetObject('PhysicalInterface', $this->Get('physicalinterface_id'), false);
			if ($oPhysicalInterface) {
				$oPhysicalInterface->Set('networksocket_id', $this->GetKey());
				$oPhysicalInterface->DBUpdate();
			}
		}

		// Set network socket at remote network socket
		if ($this->Get('networksocket_id') > 0) {
			$oRemoteNetworkSocket = MetaModel::GetObject('NetworkSocket', $this->Get('networksocket_id'), false);
			if ($oRemoteNetworkSocket) {
				$oRemoteNetworkSocket->Set('networksocket_id', $this->GetKey());

				// Attach remote network socket to the same cross connect, if any
				$CrossConnect = $this->Get('crossconnect_id');
				if ($CrossConnect > 0) {
					$oRemoteNetworkSocket->Set('crossconnect_id', $CrossConnect);
				}

				$oRemoteNetworkSocket->DBUpdate();
			}
		}

		// Set network socket at remote backend socket
		if ($this->Get('backendsocket_id') > 0) {
			$oRemoteBackendSocket = MetaModel::GetObject('NetworkSocket', $this->Get('backendsocket_id'), false);
			if ($oRemoteBackendSocket) {
				$oRemoteBackendSocket->Set('backendsocket_id', $this->GetKey());
				$oRemoteBackendSocket->DBUpdate();
			}
		}

		// Update patch panel capacities
		if ($this->Get('patchpanel_id') > 0) {
			$oPatchPanel = MetaModel::GetObject('PatchPanel', $this->Get('patchpanel_id'), false);
			if ($oPatchPanel) {
				$oPatchPanel->ComputeValues();
				$oPatchPanel->DBUpdate();
			}
		}
	}

	/**
	 * @inheritdoc
	 */
	protected function AfterUpdate(): void
	{
		parent::AfterUpdate();

		$aChanges = $this->ListPreviousValuesForUpdatedAttributes();

		// Connection to a physical interface or remote front end socket has changed
		if (array_key_exists('physicalinterface_id', $aChanges) || array_key_exists('networksocket_id', $aChanges)) {
			// Get cables first
			// 1. Front end cable that includes the network socket
			// 2. Device cable that includes the network socket
			$iId = $this->GetKey();
			$sOQL = "SELECT FrontEndNetworkCable AS nc WHERE nc.networksocket1_id = :id OR nc.networksocket2_id = :id";
			$oFrontEndNetworkCableSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id' => $iId));
			$sOQL = "SELECT DeviceNetworkCable AS nc WHERE nc.networksocket_id = :id";
			$oDeviceNetworkCableSet =  new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id' => $iId));

			if (array_key_exists('physicalinterface_id', $aChanges)) {
				if ($this->Get('physicalinterface_id') > 0) {
					// $this is connected to a device and not to a front end network socket
					// Update cables
					while ($oFrontEndNetworkCable = $oFrontEndNetworkCableSet->Fetch()) {
						$oFrontEndNetworkCable->DBDelete();
					}
					while ($oDeviceNetworkCable = $oDeviceNetworkCableSet->Fetch()) {
						$oDeviceNetworkCable->Set('physicalinterface_id', $this->Get('physicalinterface_id'));
						$oDeviceNetworkCable->DBUpdate();
					}

					// Set network socket at new remote physical interface
					$oPhysicalInterface = MetaModel::GetObject('PhysicalInterface', $this->Get('physicalinterface_id'), false);
					if ($oPhysicalInterface) {
						$oPhysicalInterface->Set('networksocket_id', $this->GetKey());
						$oPhysicalInterface->DBUpdate();
					}
				} else {
					// Delete device cables disconnected from the network socket
					while ($oDeviceNetworkCable = $oDeviceNetworkCableSet->Fetch()) {
						$oDeviceNetworkCable->DBDelete();
					}
				}

				if ($aChanges['physicalinterface_id'] > 0) {
					// Reset network socket at old remote physical interface
					$oOldPhysicalInterface = MetaModel::GetObject('PhysicalInterface', $aChanges['physicalinterface_id'], false);
					if ($oOldPhysicalInterface && ($oOldPhysicalInterface->Get('networksocket_id') == $this->GetKey())) {
						$oOldPhysicalInterface->Set('networksocket_id', 0);
						$oOldPhysicalInterface->DBUpdate();
					}
				}
			}

			// Connection to remote front end socket has changed
			if (array_key_exists('networksocket_id', $aChanges)) {
				if ($this->Get('networksocket_id') > 0) {
					// $this is connected to a front end network socket and not to a device
					// Update cables
					while ($oDeviceNetworkCable = $oDeviceNetworkCableSet->Fetch()) {
						$oDeviceNetworkCable->DBDelete();
					}
					while ($oFrontEndNetworkCable = $oFrontEndNetworkCableSet->Fetch()) {
						if ($oFrontEndNetworkCable->Get('networksocket1_id') == $iId) {
							$oFrontEndNetworkCable->Set('networksocket2_id', $this->Get('networksocket_id'));
						} else {
							$oFrontEndNetworkCable->Set('networksocket1_id', $this->Get('networksocket_id'));
						}
						$oFrontEndNetworkCable->DBUpdate();
					}

					// Set network socket at new remote network socket
					$oRemoteNetworkSocket = MetaModel::GetObject('NetworkSocket', $this->Get('networksocket_id'), false);
					if ($oRemoteNetworkSocket) {
						$oRemoteNetworkSocket->Set('networksocket_id', $this->GetKey());
						// Attach remote network socket to the same cross connect, if any
						$CrossConnect = $this->Get('crossconnect_id');
						if ($CrossConnect > 0) {
							$oRemoteNetworkSocket->Set('crossconnect_id', $CrossConnect);
						}
						$oRemoteNetworkSocket->DBUpdate();
					}
				} else {
					// Delete front end cable disconnected from the network socket
					while ($oFrontEndNetworkCable = $oFrontEndNetworkCableSet->Fetch()) {
						$oFrontEndNetworkCable->DBDelete();
					}
				}

				if ($aChanges['networksocket_id'] > 0) {
					// Reset network socket at old remote network socket
					$oOldRemoteNetworkSocket = MetaModel::GetObject('NetworkSocket', $aChanges['networksocket_id'], false);
					if ($oOldRemoteNetworkSocket && ($oOldRemoteNetworkSocket->Get('networksocket_id') == $this->GetKey())) {
						$oOldRemoteNetworkSocket->Set('networksocket_id', 0);
						$oOldRemoteNetworkSocket->Set('crossconnect_id', 0);
						$oOldRemoteNetworkSocket->DBUpdate();
					}
				}
			}
		}

		// Connection to remote back end socket has changed
		if (array_key_exists('backendsocket_id', $aChanges)) {
			// Get cables first
			// Update the back end cable that includes the network socket
			$iId = $this->GetKey();
			$sOQL = "SELECT BackEndNetworkCable AS nc WHERE nc.backendsocket1_id = :id OR nc.backendsocket2_id = :id";
			$oBackEndNetworkCableSet =  new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id' => $iId));

			if ($this->Get('backendsocket_id') > 0) {
				// $this is connected to a back end network socket
				// Update cables
				while ($oBackEndNetworkCable = $oBackEndNetworkCableSet->Fetch()) {
					if ($oBackEndNetworkCable->Get('backendsocket1_id') == $iId) {
						$oBackEndNetworkCable->Set('backendsocket2_id', $this->Get('backendsocket_id'));
					} else {
						$oBackEndNetworkCable->Set('backendsocket1_id', $this->Get('backendsocket_id'));
					}
					$oBackEndNetworkCable->DBUpdate();
				}

				// Set network socket at new remote backend socket
				$oRemoteBackendSocket = MetaModel::GetObject('NetworkSocket', $this->Get('backendsocket_id'), false);
				if ($oRemoteBackendSocket) {
					$oRemoteBackendSocket->Set('backendsocket_id', $this->GetKey());
					$oRemoteBackendSocket->DBUpdate();
				}
			} else {
				while ($oBackEndNetworkCable = $oBackEndNetworkCableSet->Fetch()) {
					$oBackEndNetworkCable->DBDelete();
				}
			}

			if ($aChanges['backendsocket_id'] > 0) {
				// Reset network socket at old remote backend socket
				$oOldRemoteeBackendSocket = MetaModel::GetObject('NetworkSocket', $aChanges['backendsocket_id'], false);
				if ($oOldRemoteeBackendSocket && ($oOldRemoteeBackendSocket->Get('backendsocket_id') == $this->GetKey())) {
					$oOldRemoteeBackendSocket->Set('backendsocket_id', 0);
					$oOldRemoteeBackendSocket->DBUpdate();
				}
			}
		}

		// PatchPanel has changed
		if (array_key_exists('patchpanel_id', $aChanges)) {
			// Update patch panel capacities
			if ($this->Get('patchpanel_id') > 0) {
				$oPatchPanel = MetaModel::GetObject('PatchPanel', $this->Get('patchpanel_id'), false);
				if ($oPatchPanel) {
					$oPatchPanel->ComputeValues();
					$oPatchPanel->DBUpdate();
				}
			}

			// Update old patch panel capacities
			if ($aChanges['patchpanel_id'] > 0) {
				$oOldPatchPanel = MetaModel::GetObject('PatchPanel', $aChanges['patchpanel_id'], false);
				if ($oOldPatchPanel) {
					$oOldPatchPanel->ComputeValues();
					$oOldPatchPanel->DBUpdate();
				}
			}
		}

		// Status has changed
		if (array_key_exists('status', $aChanges)) {
			// Update patch panel capacities
			if ($this->Get('patchpanel_id') > 0) {
				$oPatchPanel = MetaModel::GetObject('PatchPanel', $this->Get('patchpanel_id'), false);
				if ($oPatchPanel) {
					$oPatchPanel->ComputeValues();
					$oPatchPanel->DBUpdate();
				}
			}
		}
	}

	/**
	 * @inheritdoc
	 */
	protected function AfterDelete(): void
	{
		parent::AfterDelete();

		// Reset network socket at remote physical interface
		if ($this->Get('physicalinterface_id') > 0) {
			$oPhysicalInterface = MetaModel::GetObject('PhysicalInterface', $this->Get('physicalinterface_id'), false);
			if ($oPhysicalInterface) {
				$oPhysicalInterface->Set('networksocket_id', 0);
				$oPhysicalInterface->DBUpdate();
			}
		}

		// Reset network socket at remote network socket
		if ($this->Get('networksocket_id') > 0) {
			$oRemoteNetworkSocket = MetaModel::GetObject('NetworkSocket', $this->Get('networksocket_id'), false);
			if ($oRemoteNetworkSocket) {
				$oRemoteNetworkSocket->Set('networksocket_id', 0);
				$oRemoteNetworkSocket->Set('crossconnect_id', 0);
				$oRemoteNetworkSocket->DBUpdate();
			}
		}

		// Reset network socket at remote backend socket
		if ($this->Get('backendsocket_id') > 0) {
			$oRemoteBackendSocket = MetaModel::GetObject('NetworkSocket', $this->Get('backendsocket_id'), false);
			if ($oRemoteBackendSocket) {
				$oRemoteBackendSocket->Set('backendsocket_id', 0);
				$oRemoteBackendSocket->DBUpdate();
			}
		}

		// Update patch panel capacities
		if ($this->Get('patchpanel_id') > 0) {
			$oPatchPanel = MetaModel::GetObject('PatchPanel', $this->Get('patchpanel_id'), false);
			if ($oPatchPanel) {
				$oPatchPanel->ComputeValues();
				$oPatchPanel->DBUpdate();
			}
		}
	}

}

