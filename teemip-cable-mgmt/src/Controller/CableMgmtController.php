<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Controller;

use CMDBObjectSet;
use Combodo\iTop\Application\TwigBase\Controller\Controller;
use Combodo\iTop\Service\Router\Router;
use DBObjectSearch;
use DBObjectSet;
use Dict;
use Exception;
use MetaModel;
use utils;

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

	private function GetParams($sClass, $iKey): array
	{
		$aParams = [];
		$sTransactionId = utils::GetNewTransactionId();
		$aParams['sTransactionId'] = $sTransactionId;
		$aParams['id'] = $iKey;
		switch ($sClass) {
			case 'PatchPanel':
				/** @var \PatchPanel $oPatchPanel */
				$oPatchPanel = MetaModel::GetObject('PatchPanel', $iKey);
				$aParams['PatchpanelName'] = $oPatchPanel->Get('friendlyname');

				$aActionFields = $this->GetActionFieldsForOperation($oPatchPanel);
				$aParams = array_merge($aParams, $aActionFields);
				break;

			default:
				break;
		}

		return $aParams;
	}

	/**
	 * @return array
	 * @throws \Exception
	 */
	private function GetActionFieldsForOperation($oPatchPanel): array
	{
		$aParams = array();
		$iFormId = rand();

		// Patch Panel
		$sAttCode = 'patchpanel_id';
		$sAttLabel = MetaModel::GetLabel('NetworkSocket', $sAttCode);
		$iKey = $oPatchPanel->GetKey();
		$iOrgId = $oPatchPanel->Get('org_id');
		$oRemotePatchPanelSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT PatchPanel AS p WHERE p.org_id = :org_id AND p.id != :key"), array(), array('org_id' => $iOrgId, 'key' => $iKey));
		$sInputId = $iFormId.'_'.$sAttCode;
		$sHTMLValue = "<select id=\"$sInputId\" name=\"attr_$sAttCode\">\n";
		while ($oRemotePatchPanel = $oRemotePatchPanelSet->Fetch()) {
			list ($iCapacity, $oNetworkSocketSet) = $oRemotePatchPanel->GetNetworkSocketsWithFreeBackEnd($oRemotePatchPanel->GetKey());
			if ($iCapacity > 0) {
				$iRemotePatchPanel = $oRemotePatchPanel->GetKey();
				$sRemotePatchPanelName = $oRemotePatchPanel->Get('friendlyname');
				$sHTMLValue .= "<option value=\"$iRemotePatchPanel\">".$sRemotePatchPanelName."</option>\n";
			}
		}
		$sHTMLValue .= "</select>";
		$val = array(
			'label' => '<span  >'.$sAttLabel.'</span>',
			'value' => $sHTMLValue,
			'input_id' => $sInputId,
		);
		$aParams['aPatchPanelVal'] = $val;

		return $aParams;
	}

	public function OperationCreateNetworkSockets()
	{
		$iKey = utils::ReadParam('id');
		/** @var \PatchPanel $oPatchPanel */
		$oPatchPanel = MetaModel::GetObject('PatchPanel', $iKey);
		$oPatchPanel->CreateNetworkSockets();

		$aParams = [];
		$aParams['sURL'] = utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class=PatchPanel&id='.$iKey;

		$this->m_sOperation = 'CreateNetworkSockets';
		$this->DisplayPage($aParams);
	}

	public function OperationCreateBackEndNetworkCables()
	{
		$iKey = utils::ReadParam('id');
		$aParams = $this->GetParams('PatchPanel', $iKey);
		$aParams['bIssue'] = false;
		$aParams['sCancelURL'] = utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class=PatchPanel&id='.$iKey;

		$this->m_sOperation = 'CreateBackEndNetworkCables';
		$this->DisplayPage($aParams);
	}

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
			$aParams['sMessage'] = Dict::S($sError);
			$aParams = array_merge($aParams, $this->GetParams('PatchPanel', $iKey));

			$this->m_sOperation = 'CreateBackEndNetworkCables';
		} else {
			$aParams['bIssue'] = false;
			$aParams['sURL'] = utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=details&class=PatchPanel&id='.$iKey;

			$this->m_sOperation = 'DoCreateBackEndNetworkCables';
		}
		$this->DisplayPage($aParams);

	}
}



