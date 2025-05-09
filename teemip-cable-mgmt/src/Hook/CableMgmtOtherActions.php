<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\CableManagement\Hook;

use CrossConnect;
use Dict;
use iPopupMenuExtension;
use PatchPanel;
use SeparatorPopupMenuItem;
use URLPopupMenuItem;
use utils;

class CableMgmtOtherActions implements iPopupMenuExtension
{
	public static function EnumItems($iMenuId, $param)
    {
		$aResult = array();
		switch ($iMenuId) {
			case iPopupMenuExtension::MENU_OBJLIST_ACTIONS: // $param is a DBObjectSet
			case iPopupMenuExtension::MENU_OBJLIST_TOOLKIT: // $param is a DBObjectSet
				break;

			case iPopupMenuExtension::MENU_OBJDETAILS_ACTIONS: // $param is a DBObject
				$oObj = $param;

				// Additional actions for PatchPanel
				if ($oObj instanceof PatchPanel) {
					// Offer to automatically create :
					//  . the backend cables between the patch panel and a remote patch panel to be specified,
					//  . the Network Sockets if capacity is defined and if not all Network Sockets have already been created
					$iCapacity = $oObj->Get('capacity');
					if (!is_null($iCapacity) && ($iCapacity > 0)) {
						$id = $oObj->GetKey();
						list ($iCapacityForBackEndCables, $oNetworkSocketSet) = $oObj->GetNetworkSocketsWithFreeBackEnd($id);
						$aResult[] = new SeparatorPopupMenuItem();
						if ($iCapacityForBackEndCables > 0) {
							$sMenu = 'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables';
							$aResult[] = new URLPopupMenuItem($sMenu, Dict::S($sMenu), utils::GetAbsoluteUrlAppRoot()."pages/UI.php?route=cable_mgmt.create_back_end_network_cables&id=$id");
						}
						$oNetworkSocketSet = $oObj->Get('networksockets_list');
						$iNetworkSocketCount = $oNetworkSocketSet->Count();
						if ($iNetworkSocketCount < $iCapacity) {
							$sMenu = 'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets';
							$aResult[] = new URLPopupMenuItem($sMenu, Dict::S($sMenu), utils::GetAbsoluteUrlAppRoot()."pages/UI.php?route=cable_mgmt.create_network_sockets&id=$id");
						}
					}
				} elseif ($oObj instanceof CrossConnect) {
					$id = $oObj->GetKey();
					$aResult[] = new SeparatorPopupMenuItem();
					// Create or delete cables along the path according to status
					if ($oObj->Get('status') == 'production') {
						$sMenu = 'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateCables';
						$aResult[] = new URLPopupMenuItem($sMenu, Dict::S($sMenu), utils::GetAbsoluteUrlAppRoot()."pages/UI.php?route=cable_mgmt.create_cables_on_the_path&id=$id");
					}
					// List possible wirings between local patch panel and peer one
					if (($oObj->Get('patchpanel_id') > 0) && ($oObj->Get('remote_patchpanel_id') > 0)) {
						$sMenu = 'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings';
						$aResult[] = new URLPopupMenuItem($sMenu, Dict::S($sMenu), utils::GetAbsoluteUrlAppRoot()."pages/UI.php?route=cable_mgmt.list_available_wirings&id=$id");
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
