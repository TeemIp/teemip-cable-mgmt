<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Helper;

use CMDBObjectSet;
use DBObjectSearch;
use Dict;
use MetaModel;
use utils;

/**
 * Displays wiring paths
 */
class DisplayWiring
{
	/**
	 * Provides an HTML string that displays that different possible paths between 2 patch panels
	 *
	 */
	static public function DisplayPatchPanelPaths($sClass, $iKey): array
	{
		$aParams = [];
		$bIssue = false;
		$sLevel = '';
		$sMessage = '';
		//$iFormId = rand();
		switch ($sClass) {
			case 'CrossConnect':
				/** @var \CrossConnect $oCrossConnect */
				$oCrossConnect = MetaModel::GetObject('CrossConnect', $iKey);
				$iSourcePatchPanel = $oCrossConnect->Get('patchpanel_id');
				$iRemotePatchPanel = $oCrossConnect->Get('remote_patchpanel_id');
				$aTree = DisplayWiring::GetPatchPanelsTree($iSourcePatchPanel, $iRemotePatchPanel, [$iSourcePatchPanel]);
				$sHtml = DisplayWiring::GetDisplay($aTree,'CrossConnect');
				$aParams['ClassName'] = $oCrossConnect->Get('friendlyname');
				$aParams['sHtml'] = $sHtml;

				break;

		default:
			break;
		}

		$aParams['bIssue'] = $bIssue;
		$aParams['sMessage'] = $sMessage;
		$aParams['sLevel'] = $sLevel;
		return $aParams;
	}

	/**
	 * Get, in array format, the different possible paths between 2 patch panels
	 *
	 */
	static private function GetPatchPanelsTree($iSourcePatchPanel, $iTargetPatchPanel, $aExclusions): array
	{
		$aPossibleBranch = [];
		/** @var \PatchPanel $oTargetPatchPanel */
		$oTargetPatchPanel = MetaModel::GetObject('PatchPanel', $iTargetPatchPanel, false);
		$iTargetRackId = $oTargetPatchPanel->Get('rack_id');

		// Get network sockets with a backend connection and no front end connection
		$sOQL = "SELECT NetworkSocket AS ns WHERE ns.patchpanel_id = :pp_id AND ns.backendsocket_id > 0 AND ns.networksocket_id = 0 AND ns.connectableci_id = 0";
		$oNetworkSocketSet= new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('pp_id' => $iSourcePatchPanel));
		while ($oNetworkSocket = $oNetworkSocketSet->Fetch()) {
			/** @var \NetworkSocket $oRemoteNetworkSocket */
			$oRemoteNetworkSocket = MetaModel::GetObject('NetworkSocket', $oNetworkSocket->Get('backendsocket_id'), false);
			if (!is_null($oRemoteNetworkSocket)) {
				// Get patch panel hosting the backend network socket
				$iRemotePatchPanelId = $oRemoteNetworkSocket->Get('patchpanel_id');
				if (($iRemotePatchPanelId > 0) && !in_array($iRemotePatchPanelId, $aExclusions)) {
					/** @var \PatchPanel $oRemotePatchPanel */
					$oRemotePatchPanel = MetaModel::GetObject('PatchPanel', $iRemotePatchPanelId, false);
					$iRemoteRackId = $oRemotePatchPanel->Get('rack_id');

					$aBranch = [];
					$aBranch['local_pp'] = $iSourcePatchPanel;
					$aBranch['local_ns'] = $oNetworkSocket->GetKey();
					$aBranch['remote_pp'] = $iRemotePatchPanelId;
					$aBranch['remote_ns'] = $oRemoteNetworkSocket->GetKey();
					$aBranch['remote_rack'] = $iRemoteRackId;

					if ($iRemoteRackId == $iTargetRackId) {
						// Target rack is reached
						if ($iRemotePatchPanelId == $iTargetPatchPanel) {
							// Patch panel is reached => wiring path is valid
							$aBranch['end_branch'] = true;
						} else {
							// We didn't end on the right patch panel
							continue;
						}
					} else {
						// Target rack is not reached
						$aBranch['end_branch'] = false;
						$aBranch['next_pps'] = [];
						$aNextExclusions = array_merge($aExclusions, [$iRemotePatchPanelId]);

						// Find other patch panels in the rack and follow the path
						$sOQL = "SELECT PatchPanel AS pp WHERE pp.rack_id = :rack_id AND pp.id != :pp_id";
						$oPatchPanelToDiscoverSet= new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('rack_id' => $iRemoteRackId,'pp_id' => $iRemotePatchPanelId));
						while ($oPatchPanelToDiscover = $oPatchPanelToDiscoverSet->Fetch()) {
							$aBranchToDiscover = DisplayWiring::GetPatchPanelsTree($oPatchPanelToDiscover->GetKey(), $iTargetPatchPanel, $aNextExclusions);
							if (!empty($aBranchToDiscover)) {
								$aBranch['next_pps'][] = $aBranchToDiscover;
							}
						}
						if (empty($aBranch['next_pps'])) {
							continue;
						}
					}
					$aPossibleBranch[] = $aBranch;
				}
			}

		}
		return $aPossibleBranch;
	}

	/**
	 * Transform the array that provides the different possible paths between 2 patch panels into an HTML representation
	 *
	 */
	static private function GetDisplay($aTree, $sClass): string
	{
		$sHtml = '<table style="width:100%"><tr><td colspan="2">';
		$sHtml .= '<div style="vertical-align:top;" id="tree">';
		$sHtml .= DisplayWiring::GetNode($aTree, $sClass, true);
		$sHtml .= '</td></tr></table>';
		$sHtml .= '</div></div>';

		return $sHtml;
	}

	/**
	 * Get a node of the possible paths between 2 patch panels
	 *
	 */
	static private function GetNode($aTree, $sClass, $bInit): string
	{

		$sHtml = '<ul><li>';
		if (!$bInit) {
			$sHtml .= '&nbsp;&nbsp;-->>&nbsp;&nbsp;';
			$sFECicon = utils::GetAbsoluteUrlModulesRoot().'teemip-cable-mgmt/asset/img/icons8-fe-network-cable-16.png';
			$sHtml .= '<img src="'.$sFECicon.'" alt="Front End Cable" style="vertical-align:middle">&nbsp;';
			$sHtml .= '&nbsp;&nbsp;-->>&nbsp;&nbsp;';
		}

		/** @var \PatchPanel $oSourcePatchPanel */
		$oSourcePatchPanel = MetaModel::GetObject('PatchPanel', $aTree[0]['local_pp']);
		$sIcon = utils::GetAbsoluteUrlModulesRoot().'teemip-cable-mgmt/asset/img/icons8-toolbar-16.png';
		$sHtml .= '<img src="'.$sIcon.'" alt="'.$oSourcePatchPanel->Get('friendlyname').'" style="vertical-align:middle">&nbsp;'.$oSourcePatchPanel->GetHyperlink();

		$sHtml .= '<ul>';
		foreach ($aTree as $aBranch) {
			$sHtml .= '<li>';

			/** @var \NetworkSocket $oNetworkSocket */
			$oNetworkSocket = MetaModel::GetObject('NetworkSocket', $aBranch['local_ns']);
			$sNSIcon = utils::GetAbsoluteUrlModulesRoot().'teemip-cable-mgmt/asset/img/icons8-wired-network-16.png';
			$sHtml .= '<img src="'.$sNSIcon.'" alt="'.$oNetworkSocket->Get('friendlyname').'" style="vertical-align:middle">&nbsp;'.$oNetworkSocket->GetHyperlink();

			$sHtml .= '&nbsp;&nbsp;-->>&nbsp;&nbsp;';
			$sBECicon = utils::GetAbsoluteUrlModulesRoot().'teemip-cable-mgmt/asset/img/icons8-be-network-cable-16.png';
			$sHtml .= '<img src="'.$sBECicon.'" alt="Backk End Cable" style="vertical-align:middle">&nbsp;';
			$sHtml .= '&nbsp;&nbsp;-->>&nbsp;&nbsp;';

			/** @var \PatchPanel $oIntermediatePatchPanel */
			$oIntermediatePatchPanel = MetaModel::GetObject('PatchPanel', $aBranch['remote_pp']);
			$sPPIcon = utils::GetAbsoluteUrlModulesRoot().'teemip-cable-mgmt/asset/img/icons8-toolbar-16.png';
			$sHtml .= '<img src="'.$sPPIcon.'" alt="'.$oIntermediatePatchPanel->Get('friendlyname').'" style="vertical-align:middle">&nbsp;'.$oIntermediatePatchPanel->GetHyperlink();
			$sHtml .= '&nbsp;&nbsp;--&nbsp;&nbsp;';

			/** @var \NetworkSocket $oIntermediateNetworkSocket */
			$oIntermediateNetworkSocket = MetaModel::GetObject('NetworkSocket', $aBranch['remote_ns']);
			$sHtml .= '<img src="'.$sNSIcon.'" alt="'.$oIntermediateNetworkSocket->Get('friendlyname').'" style="vertical-align:middle">&nbsp;'.$oIntermediateNetworkSocket->GetHyperlink();

			if ($aBranch['end_branch'] == false) {
				foreach ($aBranch['next_pps'] as $aChildBranch) {
					$sHtml .= DisplayWiring::GetNode($aChildBranch, $sClass, false);
				}
			}
			$sHtml .= '</li>';
		}
		$sHtml .= '</ul>';

		$sHtml .= '</li></ul>';

		return $sHtml;
	}

}

