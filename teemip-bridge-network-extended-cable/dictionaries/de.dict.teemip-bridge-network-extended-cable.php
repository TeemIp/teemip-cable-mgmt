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
	'Class:NetworkSocket/Attribute:interfaceconnector_id' => 'Konnektor',
	'Class:NetworkSocket/Attribute:interfaceconnector_id+' => 'Konnektor-Typ der Netzwerk-Dose',
	'Class:NetworkSocket/Attribute:interfaceconnector_name' => 'Konnektor Name',
	'Class:NetworkSocket/Attribute:interfaceconnector_name+' => '',
));

//
// Class: InterfaceConnector
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:InterfaceConnector/Attribute:networksockets_list' => 'Netzwerk-Dose',
	'Class:InterfaceConnector/Attribute:networksockets_list+' => 'Netzwerk-Dosen mit diesem Konnektor',
));