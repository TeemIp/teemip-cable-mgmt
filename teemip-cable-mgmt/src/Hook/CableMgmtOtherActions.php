<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Hook;

use ApplicationContext;
use Dict;
use iPopupMenuExtension;
use MetaModel;
use PatchPanel;
use SeparatorPopupMenuItem;
use URLPopupMenuItem;
use utils;

class CableMgmtOtherActions implements iPopupMenuExtension {
	public static function EnumItems($iMenuId, $param) {
		$aResult = array();
		switch ($iMenuId) {
			case iPopupMenuExtension::MENU_OBJLIST_ACTIONS: // $param is a DBObjectSet
			case iPopupMenuExtension::MENU_OBJLIST_TOOLKIT: // $param is a DBObjectSet
				break;

			case iPopupMenuExtension::MENU_OBJDETAILS_ACTIONS: // $param is a DBObject
				$oObj = $param;

				// Additional actions for PatchPanel
				if ($oObj instanceof PatchPanel) {
					// Offer to automatically create the Network Sockets if capacity is defined and if no Network Socket has already been created
					$iCapacity = $oObj->Get('capacity');
					if (!is_null($iCapacity) && ($iCapacity > 0)) {
						$oNetworkSocketSet = $oObj->Get('networksockets_list');
						$iNetworkSocketCount = $oNetworkSocketSet->Count();
						$id = $oObj->GetKey();
						$aResult[] = new SeparatorPopupMenuItem();
						if ($iNetworkSocketCount > 0) {
							$sMenu = 'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables';
							$aResult[] = new URLPopupMenuItem($sMenu, Dict::S($sMenu), utils::GetAbsoluteUrlAppRoot()."pages/UI.php?route=cable_mgmt.create_back_end_network_cables&id=$id");
						}
						if ($iNetworkSocketCount < $iCapacity) {
							$sMenu = 'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets';
							$aResult[] = new URLPopupMenuItem($sMenu, Dict::S($sMenu), utils::GetAbsoluteUrlAppRoot()."pages/UI.php?route=cable_mgmt.create_network_sockets&id=$id");
						}
					}
				}
				break;

			case iPopupMenuExtension::MENU_DASHBOARD_ACTIONS: // $param is a Dashboard
			default: // Unknown type of menu, do nothing
				break;
		}

		return $aResult;
	}
}
