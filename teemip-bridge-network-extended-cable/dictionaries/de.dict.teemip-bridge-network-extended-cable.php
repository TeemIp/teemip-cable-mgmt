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
// Class: NetworkSocket
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:NetworkSocket/Attribute:interfaceconnector_id' => 'Connector',
	'Class:NetworkSocket/Attribute:interfaceconnector_id+' => 'Connector type of the network socket',
	'Class:NetworkSocket/Attribute:interfaceconnector_name' => 'Connector name',
	'Class:NetworkSocket/Attribute:interfaceconnector_name+' => '',
));

//
// Class: InterfaceConnector
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:InterfaceConnector/Attribute:networksockets_list' => 'Network sockets',
	'Class:InterfaceConnector/Attribute:networksockets_list+' => 'Network sockets with that connector',
));
