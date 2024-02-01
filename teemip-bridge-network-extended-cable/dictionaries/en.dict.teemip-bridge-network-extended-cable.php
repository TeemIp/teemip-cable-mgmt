<?php
/*
 * @copyright   Copyright (C) 2022 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'teemip-bridge-network-extended-cable Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: PatchPanel
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:PatchPanel/Attribute:interfaceconnector_id' => 'Connector',
	'Class:PatchPanel/Attribute:interfaceconnector_id+' => 'Connector type used by the patch panel',
	'Class:PatchPanel/Attribute:interfaceconnector_name' => 'Connector name',
	'Class:PatchPanel/Attribute:interfaceconnector_name+' => '',
));

//
// Class: NetworkSocket
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:NetworkSocket/Attribute:interfaceconnector_id' => 'Connector',
	'Class:NetworkSocket/Attribute:interfaceconnector_id+' => 'Connector type of the network socket',
	'Class:NetworkSocket/Attribute:interfaceconnector_name' => 'Connector name',
	'Class:NetworkSocket/Attribute:interfaceconnector_name+' => '',
));

//
// Class: InterfaceConnector
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:InterfaceConnector/Attribute:patchpanels_list' => 'Patch panels',
	'Class:InterfaceConnector/Attribute:patchpanels_list+' => 'Patch panels hosting that connector',
	'Class:InterfaceConnector/Attribute:networksockets_list' => 'Network sockets',
	'Class:InterfaceConnector/Attribute:networksockets_list+' => 'Network sockets with that connector',
));
