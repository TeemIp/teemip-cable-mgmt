<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Model;

use ApplicationContext;
use cmdbAbstractObject;
use Combodo\iTop\Application\Helper\WebResourcesHelper;
use Combodo\iTop\Service\Events\EventData;
use Combodo\iTop\Application\WebPage\WebPage;
use DBObjectSearch;
use DBObjectSet;
use Dict;
use DisplayableGraph;
use FunctionalCI;
use MetaModel;
use TeemIp\TeemIp\Extension\Framework\Helper\IPUtils;

class _CrossConnect extends FunctionalCI
{
	const DEFAULT_NETWORKSOCKET_ATTRIBUTES = array('networksocket1_id', 'networksocket2_id', 'remote_networksocket1_id', 'remote_networksocket2_id');
	const DEFAULT_LOCAL_NETWORKSOCKET_ATTRIBUTES = array('networksocket1_id', 'networksocket2_id');
	const DEFAULT_REMOTE_NETWORKSOCKET_ATTRIBUTES = array('remote_networksocket1_id', 'remote_networksocket2_id');
	const DEFAULT_GROUPING_THRESHOLD = 5;

    /**
     * Provides the ids of the local network sockets of the cross connect
     * @return array
     */
    private function GetLocalNetworkSockets(): array
    {
        $aLocalNetworkSocketAttributes = static::DEFAULT_LOCAL_NETWORKSOCKET_ATTRIBUTES;
        $aLocalNetworkSocket = [];
        foreach ($aLocalNetworkSocketAttributes as $sAtt) {
            $aLocalNetworkSocket[] = $this->Get($sAtt);
        }
        return $aLocalNetworkSocket;
    }

    /**
     * Provides the ids of the remote network sockets of the cross connect
     * @return array
     */
    private function GetRemoteNetworkSockets(): array
    {
        $aRemoteNetworkSocketAttributes = static::DEFAULT_REMOTE_NETWORKSOCKET_ATTRIBUTES;
        $aRemoteNetworkSocket = [];
        foreach ($aRemoteNetworkSocketAttributes as $sAtt) {
            $aRemoteNetworkSocket[] = $this->Get($sAtt);
        }
        return $aRemoteNetworkSocket;
    }

    /**
	 * Update given NetworkSocket status
	 *
	 * @param $iNetworkSocket
	 * @return void
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	private function UpdateNetworkSocketStatus($iNetworkSocket): void
	{
		if ($iNetworkSocket > 0) {
			/** @var \NetworkSocket $oNetworkSocket */
			$oNetworkSocket = MetaModel::GetObject('NetworkSocket', $iNetworkSocket);
			if (!is_null($oNetworkSocket)) {
				$oNetworkSocket->OnNetworkSocketComputeValuesRequestedByCableMgmt(null);
				$oNetworkSocket->DBUpdate();
			}
		}
	}

	/**
	 * Get the network sockets connected to a given network socket
	 *
	 * @param $iNetworkSocket
	 * @return array
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 */
	private function GetConnectedNetworkSockets($iNetworkSocket): array
	{
		$iFrontEndSocket = 0;
		$iBackEndSocket = 0;
		if ($iNetworkSocket > 0) {
			/** @var \NetworkSocket $oNetworkSocket */
			$oNetworkSocket = MetaModel::GetObject('NetworkSocket', $iNetworkSocket);
			if (!is_null($oNetworkSocket)) {
				$iFrontEndSocket = $oNetworkSocket->Get('networksocket_id');
				$iBackEndSocket = $oNetworkSocket->Get('backendsocket_id');
			}
		}
		return [$iFrontEndSocket, $iBackEndSocket];
	}

	/**
	 * Attach a CrossConnect to given NetworkSocket
	 *
	 * @param $iNetworkSocket
	 * @param $iCrossConnect
	 * @return void
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	private function AttachCrossConnectToNetworkSocket($iNetworkSocket, $iCrossConnect): void
	{
		if ($iNetworkSocket > 0) {
			/** @var \NetworkSocket $oNetworkSocket */
			$oNetworkSocket = MetaModel::GetObject('NetworkSocket', $iNetworkSocket);
			if (!is_null($oNetworkSocket)) {
				$oNetworkSocket->Set('crossconnect_id', $iCrossConnect);
				$oNetworkSocket->DBUpdate();
			}
		}
	}

	/**
	 * Set to the network sockets along the path the cross connect it belongs to
     *
	 * @param $iCrossConnectKey
	 * @return void
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 */
	private function AttachCrossConnectToNetworkSocketAlongThePath($iCrossConnectKey): void
	{
		// Get the list of Network Sockets
        $aLocalNetworkSocket = $this->GetLocalNetworkSockets();
        $aRemoteNetworkSocket = $this->GetRemoteNetworkSockets();
		$aNetworkSockets = [];
        foreach ($aLocalNetworkSocket as $iNetworkSocket) {
			while ($iNetworkSocket > 0) {
				$aNetworkSockets[] = $iNetworkSocket;
				list(, $iNextBackEndNetworkSocket) = $this->GetConnectedNetworkSockets($iNetworkSocket);
				if ($iNextBackEndNetworkSocket == 0) {
					break;
				}
				$aNetworkSockets[] = $iNextBackEndNetworkSocket;
                list($iNetworkSocket, ) = $this->GetConnectedNetworkSockets($iNextBackEndNetworkSocket);
				if (in_array($iNetworkSocket, $aRemoteNetworkSocket)) {
					break;
				}
			}
		}

		// Set CrossConnect to this list
		foreach ($aNetworkSockets as $iNetworkSocket) {
			$this->AttachCrossConnectToNetworkSocket($iNetworkSocket, $iCrossConnectKey);
		}
	}

	/**
	 * Create a device network cable if none exists already
	 *
	 * @param $iNetworkSocket
	 * @param $iConnectableCI
	 * @param $iPhysicalInterface
	 * @return string
	 * @throws \ArchivedObjectException
	 * @throws \CoreCannotSaveObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \CoreWarning
	 * @throws \OQLException
	 */
    private function CreateDeviceNetworkCableIfNotExists($iNetworkSocket, $iConnectableCI, $iPhysicalInterface): string
	{
		$sError = '';
		if (($iNetworkSocket == 0) || ($iPhysicalInterface == 0)) {
			$sError = Dict::S('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateDeviceNetworkCable:MissingEnd');
		}
		$sOQL = 'SELECT DeviceNetworkCable WHERE networksocket_id = :ns AND physicalinterface_id = :phint';
		$oDeviceNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('ns' => $iNetworkSocket, 'phint' => $iPhysicalInterface));
		if (!$oDeviceNetworkCableSet->CountExceeds(0)) {
			$oCable = MetaModel::NewObject('DeviceNetworkCable');
			$oCable->Set('cabletype_id', $this->Get('cabletype_id'));
			$oCable->Set('cablecategory_id', $this->Get('cablecategory_id'));
			$oCable->Set('networksocket_id', $iNetworkSocket);
			$oCable->Set('connectableci_id', $iConnectableCI);
			$oCable->Set('physicalinterface_id', $iPhysicalInterface);
			$oCable->DBInsert();
		}
		return $sError;
	}

	private function CreateFrontEndNetworkCableIfNoExists($iNetworkSocket1, $iNetworkSocket2): string
	{
		$sError = '';
		if (($iNetworkSocket1 == 0) || ($iNetworkSocket2 == 0)) {
			$sError = Dict::S('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateFrontEndNetworkCable:MissingEnd');
		}
		$sOQL = 'SELECT FrontEndNetworkCable WHERE (networksocket1_id = :id1 AND networksocket2_id = :id2) OR (networksocket1_id = :id2 AND networksocket2_id = :id1)';
		$oFrontEndNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id1' => $iNetworkSocket1, 'id2' => $iNetworkSocket2));
		if (!$oFrontEndNetworkCableSet->CountExceeds(0)) {
			$oCable = MetaModel::NewObject('$oFrontEndNetworkCable');
			$oCable->Set('cabletype_id', $this->Get('cabletype_id'));
			$oCable->Set('cablecategory_id', $this->Get('cablecategory_id'));
			$oCable->Set('networksocket1_id', $iNetworkSocket1);
			$oCable->Set('networksocket2_id', $iNetworkSocket2);
			$oCable->DBInsert();
		}
		return $sError;
	}

	/**
     *
	 * Create device and frontend network cables along the path of the cross connect
	 *
	 * @return string
	 */
    public function CreateCablesOnThePath(): string
	{
		// Create device network cables at local end
		$sError = $this->CreateDeviceNetworkCableIfNotExists($this->Get('networksocket1_id'), $this->Get('connectableci_id'), $this->Get('physicalinterface_id'));

		// Create frontend network cables along the path
        $aLocalNetworkSocket = $this->GetLocalNetworkSockets();
        $aRemoteNetworkSocket = $this->GetRemoteNetworkSockets();
        foreach ($aLocalNetworkSocket as $iNetworkSocket) {
            while ($iNetworkSocket > 0) {
                list($iNextFrontEndNetworkSocket, $iNextBackEndNetworkSocket) = $this->GetConnectedNetworkSockets($iNetworkSocket);
                if ($iNextFrontEndNetworkSocket > 0) {
                    $sNewError = $this->CreateFrontEndNetworkCableIfNoExists($iNetworkSocket, $iNextFrontEndNetworkSocket);
                    if ($sNewError != '') {
                        $sError = ($sError == '') ? $sNewError : ($sError . '\n' . $sNewError);
                    }
                }
                if (in_array($iNextBackEndNetworkSocket, $aRemoteNetworkSocket) || ($iNextBackEndNetworkSocket == 0)) {
                    break;
                }
                list($iNetworkSocket, ) = $this->GetConnectedNetworkSockets($iNextBackEndNetworkSocket);
            }
        }

        // Create device network cables at remote end
        $sNewError = $this->CreateDeviceNetworkCableIfNotExists($this->Get('remote_networksocket1_id'), $this->Get('remote_connectableci_id'), $this->Get('remote_physicalinterface_id'));
        if ($sNewError != '') {
            $sError = ($sError == '') ? $sNewError : ($sError . '\n' . $sNewError);
        }

		return $sError;
	}

    /**
     * Handle Check to write event on CrossConnects
     *
     * @param EventData $oEventDatas
     * @return void
     */
    public function OnCrossConnectCheckToWriteRequestedByCableMgmt(EventData $oEventData): void
    {
        if ($this->Get('status') == 'production') {
            if (($this->Get('networksocket1_id') == 0) || ($this->Get('remote_networksocket1_id') == 0)) {
                // A cross connect cannot be in production without its 2 main sockets configured
                $this->AddCheckIssue(Dict::S('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothMainSocketsFilled'));
            }
            if ((($this->Get('networksocket2_id') > 0) && ($this->Get('remote_networksocket2_id') == 0)) || (($this->Get('networksocket2_id') == 0) && ($this->Get('remote_networksocket2_id') > 0))) {
                // A cross connect cannot be in production without its both secondary sockets in the same state (configured or not configured)
                $this->AddCheckIssue(Dict::S('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothSecondarySocketsFilled'));
            }
        }
    }

    /**
	 * Handle write event on CrossConnects
	 *
	 * @param EventData $oEventData
	 * @return void
	 */
	public function OnCrossConnectAfterWriteRequestedByCableMgmt(EventData $oEventData): void
	{
		$aEventData = $oEventData->GetEventData();
		$aNetworkSocketAttributes = static::DEFAULT_NETWORKSOCKET_ATTRIBUTES;
		if ($aEventData['is_new']) {
			// We are in the AfterInsert situation
			foreach ($aNetworkSocketAttributes as $sAtt) {
				$iNetworkSocket = $this->Get($sAtt);
				// Attach CrossConnect to NetworkSocket
				$this->AttachCrossConnectToNetworkSocket($iNetworkSocket, $this->GetKey());
			}
			if ($this->Get('status') == 'production') {
				$this->AttachCrossConnectToNetworkSocketAlongThePath($this->GetKey());
			}
		} else {
			// We are in the AfterUpdate situation
			$aChanges = $this->ListPreviousValuesForUpdatedAttributes();
			foreach ($aNetworkSocketAttributes as $sAtt) {
				if (array_key_exists($sAtt, $aChanges)) {
                    // Note: we assume here that the case cannot exist without changing the status at the same time in
                    //  order to correctly update the network sockets along the path.
					// Newly attached network sockets are set to active
					$iNetworkSocket = $this->Get($sAtt);
					$this->AttachCrossConnectToNetworkSocket($iNetworkSocket, $this->GetKey());

					// Detached network sockets are set to inactive
					$iNetworkSocket = $aChanges[$sAtt];
					$this->AttachCrossConnectToNetworkSocket($iNetworkSocket, 0);
				}
			}

			// Update status of network sockets if status has changed
			if (array_key_exists('status', $aChanges)){
				foreach ($aNetworkSocketAttributes as $sAtt) {
					// Recompute status of NetworkSocket
					$iNetworkSocket = $this->Get($sAtt);
					$this->UpdateNetworkSocketStatus($iNetworkSocket);
				}
				if ($this->Get('status') == 'production') {
					$this->AttachCrossConnectToNetworkSocketAlongThePath($this->GetKey());
				} else {
					$this->AttachCrossConnectToNetworkSocketAlongThePath(0);
				}
			}
		}
	}

	/**
	 * Handle delete event on CrossConnects
	 *
	 * @param EventData $oEventData
	 * @return void
	 */
	public function OnCrossConnectAfterDeleteRequestedByCableMgmt(EventData $oEventData): void
	{
		$this->AttachCrossConnectToNetworkSocketAlongThePath(0);
	}

    /**
     * Get the list of all cables that are used by the Cross Connect along the path
     *
     * @return object
     * @throws \ArchivedObjectException
     * @throws \CoreException
     * @throws \OQLException
     */
	private function GetCablesAlongThePath(): object
	{
        $aLocalNetworkSocket = $this->GetLocalNetworkSockets();
        $aRemoteNetworkSocket = $this->GetRemoteNetworkSockets();
		$oNetworkCableSet = DBObjectSet::FromScratch('NetworkCable');
        $sOQLForBackEnd = 'SELECT BackEndNetworkCable WHERE (backendsocket1_id = :bes1 AND backendsocket2_id = :bes2) OR (backendsocket1_id = :bes2 AND backendsocket2_id = :bes1)';
        $sOQLForFrontEnd = 'SELECT FrontEndNetworkCable WHERE (networksocket1_id = :ns1 AND networksocket2_id = :ns2) OR (networksocket1_id = :ns2 AND networksocket2_id = :ns1)';
		foreach ($aLocalNetworkSocket as $iNetworkSocket) {
			while ($iNetworkSocket > 0) {
				list(, $iNextBackEndNetworkSocket) = $this->GetConnectedNetworkSockets($iNetworkSocket);
				if ($iNextBackEndNetworkSocket == 0) {
					break;
				}

				// Get backend cable
				$oBackEndNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQLForBackEnd), array(), array('bes1' => $iNetworkSocket, 'bes2' => $iNextBackEndNetworkSocket));
				$oNetworkCableSet->Append($oBackEndNetworkCableSet);

				if (in_array($iNextBackEndNetworkSocket, $aRemoteNetworkSocket)) {
					break;
				}

				list($iNetworkSocket, ) = $this->GetConnectedNetworkSockets($iNextBackEndNetworkSocket);
				if ($iNetworkSocket == 0) {
					break;
				}

				// Get front end cable
				$oFrontEndNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQLForFrontEnd), array(), array('ns1' => $iNextBackEndNetworkSocket, 'ns2' => $iNetworkSocket));
				$oNetworkCableSet->Append($oFrontEndNetworkCableSet);
			}
		}
		// Get device cables
		$sOQLForDevice = 'SELECT DeviceNetworkCable WHERE (networksocket_id = :ns AND physicalinterface_id = :phint)';
		$oDeviceNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQLForDevice), array(), array('ns' => $this->Get('networksocket1_id'), 'phint' => $this->Get('physicalinterface_id')));
		$oNetworkCableSet->Append($oDeviceNetworkCableSet);
		$oRemoteDeviceNetworkCableSet = new DBObjectSet(DBObjectSearch::FromOQL($sOQLForDevice), array(), array('ns' => $this->Get('remote_networksocket1_id'), 'phint' => $this->Get('remote_physicalinterface_id')));
		$oNetworkCableSet->Append($oRemoteDeviceNetworkCableSet);

		return $oNetworkCableSet;
	}

	/**
	 * @inheritdoc
	 */
	public function DisplayBareRelations(WebPage $oPage, $bEditMode = false)
	{
		// Execute parent function first
		parent::DisplayBareRelations($oPage, $bEditMode);

        if ($this->GetDisplayMode() == cmdbAbstractObject::ENUM_DISPLAY_MODE_VIEW) {
			// Display the wiring graph
			$sName = Dict::S('Class:CrossConnect/Tab:wiring');
			$sTitle = Dict::S('Class:CrossConnect/Tab:wiring+');
			$oPage->SetCurrentTab('otherrecords_list', $sName, $sTitle);

			WebResourcesHelper::EnableSimpleGraphInWebPage($oPage);
			$iMaxRecursionDepth = MetaModel::GetConfig()->Get('relations_max_depth');
			$oRelGraph = MetaModel::GetRelatedObjectsDown('wiring', [$this], $iMaxRecursionDepth, []);
			$aResults = $oRelGraph->GetObjectsByClass();
			$oGraph = DisplayableGraph::FromRelationGraph($oRelGraph, static::DEFAULT_GROUPING_THRESHOLD, 'down');

			$sContextKey = 'teemip-cable-mgmt/relation_context/CrossConnect/wiring/down';
			$oAppContext = new ApplicationContext();
			$oPage->AddSubBlock($oGraph->DisplayFilterBox($oPage, $aResults));
			$oGraph->DisplayGraph($oPage, 'wiring', $oAppContext, [], 'CrossConnect', $this->GetKey(), $sContextKey, array('this' => $this));

			if ($this->Get('status') == 'production') {
				// Display the list of cables that make the cross connect
				$oNetworkCableSet = $this->GetCablesAlongThePath();
				$sName = Dict::S('Class:CrossConnect/Tab:cables_list');
				$sTitle = Dict::S('Class:CrossConnect/Tab:cables_list+');
				IPUtils::DisplayTabContent($oPage, $sName, 'crossconnect', 'CrossConnect', $sTitle, '', $oNetworkCableSet);
			}
		}
	}


	/**
	 * Defines if the CrossConnect is active or not
	 *
	 * @return bool
	 */
	public function IsActive(): bool
	{
		switch ($this->Get('status')) {
			case 'construction':
			case 'production':
				return true;

			default:
				return false;
		}
	}

}

