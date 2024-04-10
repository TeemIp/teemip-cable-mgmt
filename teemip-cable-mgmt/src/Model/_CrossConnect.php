<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Model;

use ApplicationContext;
use Combodo\iTop\Application\Helper\WebResourcesHelper;
use Combodo\iTop\Application\UI\Base\Layout\TabContainer\Tab\AjaxTab;
use Dict;
use DisplayableGraph;
use FunctionalCI;
use MetaModel;
use utils;
use WebPage;

class _CrossConnect extends FunctionalCI
{
	const DEFAULT_NETWORKSOCKET_ATTRIBUTES = array('networksocket1_id', 'networksocket2_id', 'remote_networksocket1_id', 'remote_networksocket2_id');
	const DEFAULT_GROUPING_THRESHOLD = 5;

	/**
	 * @inheritdoc
	 */
	public function DoCheckToWrite()
	{
		parent::DoCheckToWrite();

		if ($this->Get('status') == 'production') {
			if (($this->Get('networksocket1_id') == 0) || ($this->Get('remote_networksocket1_id') == 0)) {
				// A cross connect cannot be in production without its 2 main sockets configured
				$this->m_aCheckIssues[] = Dict::S('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothMainSocketsFilled');
			}
			if ((($this->Get('networksocket2_id') > 0) && ($this->Get('remote_networksocket2_id') == 0)) || (($this->Get('networksocket2_id') == 0) && ($this->Get('remote_networksocket2_id') > 0))) {
				// A cross connect cannot be in production without its both secondary sockets in the same state (configured or not configured)
				$this->m_aCheckIssues[] = Dict::S('UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothSecondarySocketsFilled');
			}
		}
	}

	/**
	 * Update given NetworkSocket when attached to or detached from Cross Connect
	 * @param $iNetworkSocket
	 * @return void
	 */
	private function UpdateNetworkSocket($iNetworkSocket): void
	{
		if ($iNetworkSocket > 0) {
			$iKey = $this->GetKey();
			/** @var \NetworkSocket $oNetworkSocket */
			$oNetworkSocket = MetaModel::GetObject('NetworkSocket', $iNetworkSocket);
			if (!is_null($oNetworkSocket)) {
				$oNetworkSocket->Set('crossconnect_id', $iKey);
				$oNetworkSocket->ComputeValues();
				$oNetworkSocket->DBUpdate();
			}
		}
	}

	/**
	 * @inheritdoc
	 */
	protected function AfterInsert(): void
	{
		parent::AfterInsert();

		// Update attached network sockets
		$aNetworkSocketAttributes = static::DEFAULT_NETWORKSOCKET_ATTRIBUTES;
		foreach ($aNetworkSocketAttributes AS $sAtt) {
			$iNetworkSocketKey = $this->Get($sAtt);
			$this->UpdateNetworkSocket($iNetworkSocketKey);
		}
	}

	/**
	 * @inheritdoc
	 */
	protected function AfterUpdate(): void
	{
		parent::AfterUpdate();

		$aChanges = $this->ListPreviousValuesForUpdatedAttributes();

		// Update status of network sockets if any of these have changed
		$aNetworkSocketAttributes = static::DEFAULT_NETWORKSOCKET_ATTRIBUTES;
		foreach ($aNetworkSocketAttributes AS $sAtt) {
			if (array_key_exists($sAtt, $aChanges) ) {
				// Newly attached network sockets are set to active
				$iNetworkSocketKey = $this->Get($sAtt);
				$this->UpdateNetworkSocket($iNetworkSocketKey);

				// Detached network sockets are set to inactive
				$iNetworkSocketKey = $aChanges[$sAtt];
				$this->UpdateNetworkSocket($iNetworkSocketKey);
			}
		}

		// Update status of network sockets if status has changed
		if (array_key_exists('status', $aChanges)){
			foreach ($aNetworkSocketAttributes AS $sAtt) {
				// Make sure attached network sockets are set to active
				$iNetworkSocketKey = $this->Get($sAtt);
				$this->UpdateNetworkSocket($iNetworkSocketKey);
			}
		}

	}

	/**
	 * @inheritdoc
	 */
	protected function AfterDelete(): void
	{
		parent::AfterDelete();

		// Set status of detached network sockets to inactive
		$aNetworkSocketAttributes = static::DEFAULT_NETWORKSOCKET_ATTRIBUTES;
		foreach ($aNetworkSocketAttributes AS $sAtt) {
			$iNetworkSocketKey = $this->Get($sAtt);
			$this->UpdateNetworkSocket($iNetworkSocketKey);
		}
	}

	/**
	 * @inheritdoc
	 */
	public function DisplayBareRelations(WebPage $oPage, $bEditMode = false)
	{
		// Execute parent function first
		parent::DisplayBareRelations($oPage, $bEditMode);

		if (!$bEditMode) {
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

