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
	const MODULE_CODE = 'teemip-cable-mgmt';
	const FUNCTION_CODE = 'find_wiring_paths';
	const FUNCTION_SETTING_MAX_RACK_LEVELS= 'max_rack_levels_to_cross';
	const FUNCTION_SETTING_MAX_OFFERS = 'max_offers_to_display';

	const DEFAULT_FUNCTION_SETTING_MAX_RACK_LEVELS = 5;
	const DEFAULT_FUNCTION_SETTING_MAX_OFFERS = 32;

	protected $aDefaultSettings = array();

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$this->aDefaultSettings = array(
			static::FUNCTION_SETTING_MAX_RACK_LEVELS => static::DEFAULT_FUNCTION_SETTING_MAX_RACK_LEVELS,
			static::FUNCTION_SETTING_MAX_OFFERS => static::DEFAULT_FUNCTION_SETTING_MAX_OFFERS,
		);
	}

	/**
	 * Read module settings and return parameters required for the process to run
	 *
	 * @return array
	 */
	private function GetSetting(): array
	{
		$aFunctionSettings = MetaModel::GetModuleSetting(static::MODULE_CODE, static::FUNCTION_CODE, $this->aDefaultSettings);
		return [
			$aFunctionSettings[static::FUNCTION_SETTING_MAX_RACK_LEVELS],
			$aFunctionSettings[static::FUNCTION_SETTING_MAX_OFFERS]
		];
	}

	/**
	 * Provides an HTML string that displays the different possible paths between 2 patch panels
	 *
	 */
	public function DisplayPatchPanelPaths($sClass, $iKey): array
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
				list ($iMaxRackLevels, $iMaxOffers) = $this->GetSetting();
				if ($iMaxRackLevels < 1) {
					$sHtml = Dict::Format('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxRackLevelIsTooShort', $iMaxRackLevels);
				} elseif ($iMaxOffers < 1) {
					$sHtml = Dict::Format('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxOffersIsTooLow', $iMaxOffers);
				} else {
					list ($aTree, $iMaxOffersRemaining) = $this->GetPatchPanelsTree($iSourcePatchPanel, $iRemotePatchPanel, [$iSourcePatchPanel], $iMaxRackLevels, $iMaxOffers);
					$sHtml = $this->GetDisplay($aTree, $iMaxOffers, $iMaxOffersRemaining, 'CrossConnect');
				}
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
	 * @param $iSourcePatchPanel: PatchPanel where to start the path research from
	 * @param $iTargetPatchPanel: PatchPanel where to end the research
	 * @param $aExclusions: List of PatchPanels that should be excluded form the search
	 * @param $iMaxRackLevels: Max number of racks that should be crossed the cable path
	 * @param $iMaxOffers: Max number of offers to make
	 * @return array:
	 */
	private function GetPatchPanelsTree($iSourcePatchPanel, $iTargetPatchPanel, $aExclusions, $iMaxRackLevels, $iMaxOffers): array
	{
		$aPossibleBranch = [];
		/** @var \PatchPanel $oTargetPatchPanel */
		$oTargetPatchPanel = MetaModel::GetObject('PatchPanel', $iTargetPatchPanel, false);
		$iTargetRackId = $oTargetPatchPanel->Get('rack_id');

		// Get network sockets of SourcePatchPanel with a backend connection and no front end connection
		$sOQL = "SELECT NetworkSocket AS ns WHERE ns.patchpanel_id = :pp_id AND ns.backendsocket_id > 0 AND ns.networksocket_id = 0 AND ns.connectableci_id = 0";
		$oNetworkSocketSet= new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('pp_id' => $iSourcePatchPanel));
		while (($oNetworkSocket = $oNetworkSocketSet->Fetch()) && ($iMaxOffers > 0)) {
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
							$iMaxOffers--;
						} else {
							// We didn't end on the right patch panel
							continue;
						}
					} else {
						// Target rack is not reached
						$aBranch['next_pps'] = [];
						if ($iMaxRackLevels != 0) {
							// Max number of racks to cross is not exceeded
							$aBranch['end_branch'] = false;
							$aNextExclusions = array_merge($aExclusions, [$iRemotePatchPanelId]);

							// Find other patch panels in the rack and follow the path
							$sOQL = "SELECT PatchPanel AS pp WHERE pp.rack_id = :rack_id AND pp.id != :pp_id";
							$oPatchPanelToDiscoverSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('rack_id' => $iRemoteRackId, 'pp_id' => $iRemotePatchPanelId));
							while ($oPatchPanelToDiscover = $oPatchPanelToDiscoverSet->Fetch()) {
								list ($aBranchToDiscover, $iMaxOffers) = $this->GetPatchPanelsTree($oPatchPanelToDiscover->GetKey(), $iTargetPatchPanel, $aNextExclusions, $iMaxRackLevels - 1, $iMaxOffers);
								if (!empty($aBranchToDiscover)) {
									$aBranch['next_pps'][] = $aBranchToDiscover;
								}
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
		return [$aPossibleBranch, $iMaxOffers];
	}

	/**
	 * Transform the array that provides the different possible paths between 2 patch panels into an HTML representation
	 *
	 */
	private function GetDisplay($aTree, $iMaxOffers, $iMaxOffersRemaining, $sClass): string
	{
		$sHtml = '<table style="width:100%"><tr><td colspan="2">';
		$sHtml .= '<div style="vertical-align:top;" id="tree">';
		$sHtml .= '<ul><li>';
		$sHtml .= '<b>'.Dict::Format('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:NumberOfOffers', ($iMaxOffers - $iMaxOffersRemaining), $iMaxOffers).'</b>';
		$sHtml .= $this->GetNode($aTree, $sClass, true);
		$sHtml .= '</td></tr></table>';
		$sHtml .= '</div></div>';

		return $sHtml;
	}

	/**
	 * Get a node of the possible paths between 2 patch panels
	 *
	 */
	private function GetNode($aTree, $sClass, $bInit): string
	{

		if (!$bInit) {
			$sHtml = '<ul><li>';
			$sHtml .= '&nbsp;&nbsp;-->>&nbsp;&nbsp;';
			$sFECicon = utils::GetAbsoluteUrlModulesRoot().'teemip-cable-mgmt/asset/img/icons8-fe-network-cable-16.png';
			$sHtml .= '<img src="'.$sFECicon.'" alt="Front End Cable" style="vertical-align:middle">&nbsp;';
			$sHtml .= '&nbsp;&nbsp;-->>&nbsp;&nbsp;';
		} else {
			$sHtml ='';
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

			if (!$aBranch['end_branch']) {
				foreach ($aBranch['next_pps'] as $aChildBranch) {
					$sHtml .= $this->GetNode($aChildBranch, $sClass, false);
				}
			}
			$sHtml .= '</li>';
		}
		$sHtml .= '</ul>';

		$sHtml .= '</li></ul>';

		return $sHtml;
	}

}

