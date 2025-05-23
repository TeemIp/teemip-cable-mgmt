<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Model;

use Combodo\iTop\Service\Events\EventData;
use DBObjectSearch;
use DBObjectSet;
use Dict;
use MetaModel;
use NetworkInterface;

class _NetworkSocket extends NetworkInterface
{
	const DEFAULT_CHAR_DELIMITER = '/';

	/**
	 * @inheritdoc
	 */
	public function PrefillCreationForm(&$aContextParam): void
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
     * Handle write event on NetworkSockets
     *
     * @param EventData $oEventData
     * @return void
     */
	public function OnNetworkSocketComputeValuesRequestedByCableMgmt(?EventData $oEventData=null): void
	{
		// Set name
		$this->Set('name', $this->ComputeName());

		// Set status
		$this->Set('status', $this->ComputeStatus());
	}

    /**
     * Set attribute flags event on NetworkSocket
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnNetworkSocketSetAttributesFlagsRequestedByCableMgmt(EventData $oEventData): void
    {
        $this->AddAttributeFlags('status', OPT_ATT_READONLY);
        $this->AddAttributeFlags('crossconnect_id', OPT_ATT_READONLY);
	}

    /**
     * Handle Check to write event on NetworkSockets
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnNetworkSocketCheckToWriteRequestedByCableMgmt(EventData $oEventData): void
	{
		// Patch panel must be selected if rack is selected
		$iRack = $this->Get('rack_id');
		if ($iRack > 0) {
			if ($this->Get('patchpanel_id') <= 0) {
				$this->AddCheckIssue(Dict::S('UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel'));
			}
		}

		// Network socket cannot be connected to both a remote network socket and a connectable CI
		$iConnectableCI = $this->Get('connectableci_id');
		$iRemoteNetworkSocket = $this->Get('networksocket_id');
		if (($iConnectableCI > 0) && ($iRemoteNetworkSocket > 0)) {
			$this->AddCheckIssue(Dict::S('UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket'));
		}
		if (($iRemoteNetworkSocket > 0) && ($this->Get('backendsocket_id') == $iRemoteNetworkSocket)) {
			$this->AddCheckIssue(Dict::S('UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket'));
		}
	}

    /**
     * Handle Before write event on NetworkSockets
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnNetworkSocketBeforeWriteRequestedByCableMgmt(EventData $oEventData): void
    {
        $aEventData = $oEventData->GetEventData();
        $iKey = $this->GetKey();
        // We are in the BeforeInsert and BeforeUpdate situations

        // Set CI and physical interface if the socket is a local or remote socket of the cross connect
        $iCrossConnect = $this->Get('crossconnect_id');
        if (($iCrossConnect > 0) && ($this->Get('networksocket_id') == 0)) {
            $oCrossConnect = MetaModel::GetObject('CrossConnect', $iCrossConnect);
            if ($oCrossConnect) {
                if (($iKey == $oCrossConnect->Get('networksocket1_id')) || ($iKey == $oCrossConnect->Get('networksocket2_id'))) {
                    $this->Set('connectableci_id', $oCrossConnect->Get('connectableci_id'));
                    $this->Set('physicalinterface_id', $oCrossConnect->Get('physicalinterface_id'));
                } elseif (($iKey == $oCrossConnect->Get('remote_networksocket1_id')) || ($iKey == $oCrossConnect->Get('remote_networksocket2_id'))) {
                    $this->Set('connectableci_id', $oCrossConnect->Get('remote_connectableci_id'));
                    $this->Set('physicalinterface_id', $oCrossConnect->Get('remote_physicalinterface_id'));
                }
            }
        }
    }

    /**
     * Handle After write event on NetworkSockets
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnNetworkSocketAfterWriteRequestedByCableMgmt(EventData $oEventData): void
	{
        $aEventData = $oEventData->GetEventData();
        $iKey = $this->GetKey();
        if ($aEventData['is_new']) {
            // We are in the AfterInsert situation
            // Set network socket at remote physical interface
            if ($this->Get('physicalinterface_id') > 0) {
                $oPhysicalInterface = MetaModel::GetObject('PhysicalInterface', $this->Get('physicalinterface_id'), false);
                if ($oPhysicalInterface) {
                    $oPhysicalInterface->Set('networksocket_id', $iKey);
                    $oPhysicalInterface->DBUpdate();
                }
            }

            // Set network socket at remote network socket
            if ($this->Get('networksocket_id') > 0) {
                $oRemoteNetworkSocket = MetaModel::GetObject('NetworkSocket', $this->Get('networksocket_id'), false);
                if ($oRemoteNetworkSocket) {
                    $oRemoteNetworkSocket->Set('networksocket_id', $iKey);

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
                    $oRemoteBackendSocket->Set('backendsocket_id', $iKey);
                    $oRemoteBackendSocket->DBUpdate();
                }
            }

            // Update patch panel capacities
            if ($this->Get('patchpanel_id') > 0) {
                $oPatchPanel = MetaModel::GetObject('PatchPanel', $this->Get('patchpanel_id'), false);
                if ($oPatchPanel) {
                    $oPatchPanel->OnPatchPanelComputeValuesRequestedByCableMgmt();
                    $oPatchPanel->DBUpdate();
                }
            }
        } else {
            // We are in the AfterUpdate situation
            $aChanges = $this->ListPreviousValuesForUpdatedAttributes();

            // Connection to a physical interface or remote front end socket has changed
            if (array_key_exists('physicalinterface_id', $aChanges) || array_key_exists('networksocket_id', $aChanges)) {
                // Get cables first
                // 1. Front end cable that includes the network socket
                // 2. Device cable that includes the network socket
                $sOQL = "SELECT FrontEndNetworkCable AS nc WHERE nc.networksocket1_id = :id OR nc.networksocket2_id = :id";
                $oFrontEndNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id' => $iKey));
                $sOQL = "SELECT DeviceNetworkCable AS nc WHERE nc.networksocket_id = :id";
                $oDeviceNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id' => $iKey));

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
                            $oPhysicalInterface->Set('networksocket_id', $iKey);
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
                        if ($oOldPhysicalInterface && ($oOldPhysicalInterface->Get('networksocket_id') == $iKey)) {
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
                            if ($oFrontEndNetworkCable->Get('networksocket1_id') == $iKey) {
                                $oFrontEndNetworkCable->Set('networksocket2_id', $this->Get('networksocket_id'));
                            } else {
                                $oFrontEndNetworkCable->Set('networksocket1_id', $this->Get('networksocket_id'));
                            }
                            $oFrontEndNetworkCable->DBUpdate();
                        }

                        // Set network socket at new remote network socket
                        $oRemoteNetworkSocket = MetaModel::GetObject('NetworkSocket', $this->Get('networksocket_id'), false);
                        if ($oRemoteNetworkSocket) {
                            $oRemoteNetworkSocket->Set('networksocket_id', $iKey);
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
                        if ($oOldRemoteNetworkSocket && ($oOldRemoteNetworkSocket->Get('networksocket_id') == $iKey)) {
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
                $sOQL = "SELECT BackEndNetworkCable AS nc WHERE nc.backendsocket1_id = :id OR nc.backendsocket2_id = :id";
                $oBackEndNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id' => $iKey));

                if ($this->Get('backendsocket_id') > 0) {
                    // $this is connected to a back end network socket
                    // Update cables
                    while ($oBackEndNetworkCable = $oBackEndNetworkCableSet->Fetch()) {
                        if ($oBackEndNetworkCable->Get('backendsocket1_id') == $iKey) {
                            $oBackEndNetworkCable->Set('backendsocket2_id', $this->Get('backendsocket_id'));
                        } else {
                            $oBackEndNetworkCable->Set('backendsocket1_id', $this->Get('backendsocket_id'));
                        }
                        $oBackEndNetworkCable->DBUpdate();
                    }

                    // Set network socket at new remote backend socket
                    $oRemoteBackendSocket = MetaModel::GetObject('NetworkSocket', $this->Get('backendsocket_id'), false);
                    if ($oRemoteBackendSocket) {
                        $oRemoteBackendSocket->Set('backendsocket_id', $iKey);
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
                    if ($oOldRemoteeBackendSocket && ($oOldRemoteeBackendSocket->Get('backendsocket_id') == $iKey)) {
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
                        $oPatchPanel->OnPatchPanelComputeValuesRequestedByCableMgmt();
                        $oPatchPanel->DBUpdate();
                    }
                }

                // Update old patch panel capacities
                if ($aChanges['patchpanel_id'] > 0) {
                    $oOldPatchPanel = MetaModel::GetObject('PatchPanel', $aChanges['patchpanel_id'], false);
                    if ($oOldPatchPanel) {
                        $oOldPatchPanel->OnPatchPanelComputeValuesRequestedByCableMgmt();
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
                        $oPatchPanel->OnPatchPanelComputeValuesRequestedByCableMgmt();
                        $oPatchPanel->DBUpdate();
                    }
                }
            }
        }
	}

    /**
     * Handle After delete event on NetworkSockets
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnNetworkSocketAfterDeleteRequestedByCableMgmt(EventData $oEventData): void
	{
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
				$oPatchPanel->OnPatchPanelComputeValuesRequestedByCableMgmt();
				$oPatchPanel->DBUpdate();
			}
		}
	}

}

