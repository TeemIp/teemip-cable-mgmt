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

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:NetworkSocket/Attribute:interfaceconnector_id' => 'Connecteur',
	'Class:NetworkSocket/Attribute:interfaceconnector_id+' => 'Type de connecteur utilisé par la prise réseau',
	'Class:NetworkSocket/Attribute:interfaceconnector_name' => 'Nom connecteur',
	'Class:NetworkSocket/Attribute:interfaceconnector_name+' => '',
));

//
// Class: InterfaceConnector
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:InterfaceConnector/Attribute:networksockets_list' => 'Prises réseau',
	'Class:InterfaceConnector/Attribute:networksockets_list+' => 'Prises réseau utilisant ce connecteur',
));




