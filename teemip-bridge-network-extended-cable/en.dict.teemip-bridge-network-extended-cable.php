<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'teemip-bridge-network-extended-cable Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: NetworkSocket
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:NetworkSocket:networksocketinfo' => 'Connected Network Socket',
	'Class:NetworkSocket/Attribute:interfaceconnector_id' => 'Connector',
	'Class:NetworkSocket/Attribute:interfaceconnector_id+' => 'Connector type of the network socket',
	'Class:NetworkSocket/Attribute:interfaceconnector_name' => 'Connector name',
	'Class:NetworkSocket/Attribute:interfaceconnector_name+' => '',
));

//
// Class: InterfaceConnector
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:InterfaceConnector/Attribute:networksockets_list' => 'Network sockets',
	'Class:InterfaceConnector/Attribute:networksockets_list+' => 'Network sockets with that connector',
));




