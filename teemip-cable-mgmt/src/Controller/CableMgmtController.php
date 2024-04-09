<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Controller;

use cmdbAbstractObject;
use CMDBObjectSet;
use Combodo\iTop\Application\TwigBase\Controller\Controller;
use DBObjectSearch;
use Dict;
use Exception;
use IPConfig;
use MetaModel;
use TeemIp\TeemIp\Extension\CableManagement\Helper\DisplayWiring;
use utils;
use WebPage;

class CableMgmtController extends Controller
{
	public const ROUTE_NAMESPACE = 'cable_mgmt';

	public function __construct($sViewPath = '', $sModuleName = 'teemip-cable-mgmt', $aAdditionalPaths = [])
	{
		$sModuleName = 'teemip-cable-mgmt';
		$sViewPath = MODULESROOT.$sModuleName.'/templates';
		parent::__construct($sViewPath, $sModuleName, $aAdditionalPaths);

		$this->CheckAccess();
	}

	/**
	 * Returns the list of parameters that should be requested for a given operation
	 *
	 */
	private function GetParams($sOperation, $iKey): array
	{
		$aParams = [];
		$sTransactionId = utils::GetNewTransactionId();
		$aParams['sTransactionId'] = $sTransactionId;
		$aParams['id'] = $iKey;
		switch ($sOperation) {
			case 'CreateBackEndNetworkCables':
				/** @var \PatchPanel $oPatchPanel */
				$oPatchPanel = MetaModel::GetObject('PatchPanel', $iKey);
				$aParams['PatchpanelName'] = $oPatchPanel->Get('friendlyname');

				list($bIssue, $sLevel, $sMessage, $aActionFields) = $this->GetActionFieldsForOperation($sOperation, $oPatchPanel);
				$aParams = array_merge($aParams, $aActionFields);
				break;

			default:
				$bIssue = true;
				$sLevel = 'failure';
				$sMessage = Dict::S('UI:CableManagement:Action:OperationNotFound');
				break;
		}

		return [$bIssue, $sLevel, $sMessage, $aParams];
	}

	/**
	 * Get the list of html fields that should be included in a form for a given operation
	 *
	 */
	private function GetActionFieldsForOperation($sOperation, $oObj): array
	{
		$aParams = array();
		$bIssue = false;
		$sLevel = '';
		$sMessage = '';
		$iFormId = rand();

		switch ($sOperation) {
			case 'CreateBackEndNetworkCables':
				// Find list of potential remote patch panel
				/** @var \PatchPanel $oObj */
				$sAttCode = 'patchpanel_id';
				$sAttLabel = MetaModel::GetLabel('NetworkSocket', $sAttCode);
				$iKey = $oObj->GetKey();
				$iOrg = $oObj->Get('org_id');
				$sAllowBackEndNetworkCableToCrossOrgs = IPConfig::GetFromGlobalIPConfig('allow_backendnetworkcable_to_cross_orgs', $iOrg);
				if ($sAllowBackEndNetworkCableToCrossOrgs == 'yes') {
					$sOQL = "SELECT PatchPanel AS p WHERE p.id != :key";
					$aObjectSetParams = ['key' => $iKey];

				} else {
					$sOQL = "SELECT PatchPanel AS p WHERE p.org_id = :org_id AND p.id != :key";
					$aObjectSetParams = ['org_id' => $iOrg, 'key' => $iKey];
				}
				$oRemotePatchPanelSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), $aObjectSetParams);
				$sInputId = $iFormId.'_'.$sAttCode;
				if ($oRemotePatchPanelSet->CountExceeds(0)) {
					$bEmptyList = true;
					$sHTMLValue = "<select id=\"$sInputId\" name=\"attr_$sAttCode\">\n";
					while ($oRemotePatchPanel = $oRemotePatchPanelSet->Fetch()) {
						list ($iCapacity, $oNetworkSocketSet) = $oRemotePatchPanel->GetNetworkSocketsWithFreeBackEnd($oRemotePatchPanel->GetKey());
						if ($iCapacity > 0) {
							$bEmptyList = false;
							$iRemotePatchPanel = $oRemotePatchPanel->GetKey();
							$sRemotePatchPanelName = $oRemotePatchPanel->Get('friendlyname');
							$sHTMLValue .= "<option value=\"$iRemotePatchPanel\">".$sRemotePatchPanelName."</option>\n";
						}
					}
					$sHTMLValue .= "</select>";
					if ($bEmptyList) {
						$bIssue = true;
						$sLevel = 'failure';
						$sMessage = Dict::S('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelAvailable');
					}
				} else {
					$sHTMLValue = Dict::S('UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelAvailable');
				}
				$val = array(
					'label' => '<span  >'.$sAttLabel.'</span>',
					'value' => $sHTMLValue,
					'input_id' => $sInputId,
				);
				$aParams['aPatchPanelVal'] = $val;
				break;

			default:
				$bIssue = true;
				$sLevel = 'failure';
				$sMessage = Dict::S('UI:CableManagement:Action:OperationNotFound');
				break;
		}

		return [$bIssue, $sLevel, $sMessage, $aParams];
	}

	/**
	 * Create the NetworkSockets of a given PatchPanel
	 *
	 */
	public function OperationCreateNetworkSockets()
	{
		$iKey = utils::ReadParam('id');
		/** @var \PatchPanel $oPatchPanel */
		$oPatchPanel = MetaModel::GetObject('PatchPanel', $iKey);
		$sError = $oPatchPanel->CreateNetworkSockets();

		if ($sError != '') {
			cmdbAbstractObject::SetSessionMessage('PatchPanel', $iKey, 'create_network_socket', Dict::S($sError), WebPage::ENUM_SESSION_MESSAGE_SEVERITY_ERROR, 0);
		}
		$aParams = [];
		$aParams['sURL'] = utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class=PatchPanel&id='.$iKey;
		$this->m_sOperation = 'CreateNetworkSockets';
		$this->DisplayPage($aParams);
	}

	/**
	 * Start operation to create Backend Cables between 2 PatchPanels
	 *
	 */
	public function OperationCreateBackEndNetworkCables()
	{
		$sOperation = 'CreateBackEndNetworkCables';
		$iKey = utils::ReadParam('id');
		list($bIssue, $sLevel, $sMessage, $aParams) = $this->GetParams($sOperation,$iKey);
		$aParams['bIssue'] = $bIssue;
		$aParams['sMessage'] = $sMessage;
		$aParams['sLevel'] = $sLevel;
		$aParams['sCancelURL'] = utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class=PatchPanel&id='.$iKey;

		$this->m_sOperation = $sOperation;
		$this->DisplayPage($aParams);
	}

	/**
	 * Create Backend Cables between 2 PatchPanels
	 *
	 */
	public function OperationDoCreateBackEndNetworkCables()
	{
		$sTransactionId = utils::ReadPostedParam('transaction_id', '', 'transaction_id');
		if (!utils::IsTransactionValid($sTransactionId)) {
			throw new Exception(Dict::S('iTopUpdate:Error:InvalidToken'));
		}

		$iKey = utils::ReadParam('id');
		$iRemotePatchPanel = utils::ReadParam('attr_patchpanel_id');
		/** @var \PatchPanel $oPatchPanel */
		$oPatchPanel = MetaModel::GetObject('PatchPanel', $iKey);
		$sError = $oPatchPanel->CreateBackEndNetworkCables($iRemotePatchPanel);

		$aParams = [];
		if ($sError != '') {
			$aParams['bIssue'] = true;
			$aParams['slevel'] = 'warning';
			$aParams['sMessage'] = Dict::S($sError);
			$aParams = array_merge($aParams, $this->GetParams('PatchPanel', $iKey));

			$this->m_sOperation = 'CreateBackEndNetworkCables';
		} else {
			$aParams['bIssue'] = false;
			$aParams['slevel'] = '';
			$aParams['sURL'] = utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class=PatchPanel&id='.$iKey;

			$this->m_sOperation = 'DoCreateBackEndNetworkCables';
		}
		$this->DisplayPage($aParams);

	}

	/**
	 * List available wiring paths between 2 PathPanels
	 *
	 */
	public function OperationListAvailableWirings()
	{
		$iKey = utils::ReadParam('id');
		$oDisplayWiring = new DisplayWiring();
		$aParams = $oDisplayWiring->DisplayPatchPanelPaths('CrossConnect', $iKey);

		$aParams['Class'] = MetaModel::GetName('CrossConnect');

		$aParams['sCancelURL'] = utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class=CrossConnect&id='.$iKey;

		$this->m_sOperation = 'ListAvailableWirings';
		$this->AddLinkedStylesheet(utils::GetAbsoluteUrlModulesRoot().'teemip-framework/asset/css/teemip-display-tree.css');
		$this->DisplayPage($aParams);
	}
}



