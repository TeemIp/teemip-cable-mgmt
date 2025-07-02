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

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PatchPanel/Attribute:interfaceconnector_id' => 'Konnektor',
	'Class:PatchPanel/Attribute:interfaceconnector_id+' => 'Konnektortyp des Patchpanels.',
	'Class:PatchPanel/Attribute:interfaceconnector_name' => 'Konnektor Name',
	'Class:PatchPanel/Attribute:interfaceconnector_name+' => '',
));

//
// Class: NetworkSocket
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:NetworkSocket/Attribute:interfaceconnector_id' => 'Konnektor',
	'Class:NetworkSocket/Attribute:interfaceconnector_id+' => 'Konnektortyp der Netzwerkdose.',
	'Class:NetworkSocket/Attribute:interfaceconnector_name' => 'Konnektor Name',
	'Class:NetworkSocket/Attribute:interfaceconnector_name+' => '',
));

//
// Class: InterfaceConnector
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:InterfaceConnector/Attribute:patchpanels_list' => 'Patchpanels',
	'Class:InterfaceConnector/Attribute:patchpanels_list+' => 'Patchpanels, in denen dieser Steckverbindertyp genutzt wird.',
	'Class:InterfaceConnector/Attribute:networksockets_list' => 'Netzwerkdosen',
	'Class:InterfaceConnector/Attribute:networksockets_list+' => 'Netzwerkdosen mit diesem Konnektor.',
));
