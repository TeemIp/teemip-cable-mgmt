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

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PatchPanel/Attribute:interfaceconnector_id' => 'Conector',
	'Class:PatchPanel/Attribute:interfaceconnector_id+' => 'Tipo de conector usado pelo patch panel',
	'Class:PatchPanel/Attribute:interfaceconnector_name' => 'Nome do Conector',
	'Class:PatchPanel/Attribute:interfaceconnector_name+' => '',
));

//
// Class: NetworkSocket
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NetworkSocket/Attribute:interfaceconnector_id' => 'Conector',
	'Class:NetworkSocket/Attribute:interfaceconnector_id+' => 'Tipo de conector do ponto de rede',
	'Class:NetworkSocket/Attribute:interfaceconnector_name' => 'Nome do Conector',
	'Class:NetworkSocket/Attribute:interfaceconnector_name+' => '',
));

//
// Class: InterfaceConnector
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:InterfaceConnector/Attribute:patchpanels_list' => 'Patch panels',
	'Class:InterfaceConnector/Attribute:patchpanels_list+' => 'Patch panels que utilizam esse conector',
	'Class:InterfaceConnector/Attribute:networksockets_list' => 'Pontos de rede',
	'Class:InterfaceConnector/Attribute:networksockets_list+' => 'Pontos de rede com esse conector',
));
