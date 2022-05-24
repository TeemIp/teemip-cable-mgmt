<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'teemip-cable-mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: PatchPanel
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:PatchPanel' => 'Patch Panel',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => 'General Information',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack hosting the patch panel',
	'Class:PatchPanel/Attribute:rack_name' => 'Rack name',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Network sockets',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'List of all network sockets of the patch panel',
));

//
// Class: NetworkSocket
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:NetworkSocket' => 'Network Socket',
	'Class:NetworkSocket+' => '',
	'Class:NetworkSocket:baseinfo' => 'General Information',
	'Class:NetworkSocket:connectableciinfo' => 'Connected Device',
	'Class:NetworkSocket:networksocketinfo' => 'Connected Network Socket',
	'Class:NetworkSocket:moreinfo' => 'More Information',
	'Class:NetworkSocket/Attribute:code' => 'Code',
	'Class:NetworkSocket/Attribute:code+' => 'Code used to identify the socket within its patch panel or its location',
	'Class:NetworkSocket/Attribute:status' => 'Status',
	'Class:NetworkSocket/Attribute:status+' => '',
	'Class:NetworkSocket/Attribute:status/Value:active' => 'Active',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => 'Inactive',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:location_id' => 'Location',
	'Class:NetworkSocket/Attribute:location_id+' => 'Location of the rack containing the patch panel and the network socket or room hosting the network socket',
	'Class:NetworkSocket/Attribute:location_name' => 'Location name',
	'Class:NetworkSocket/Attribute:location_name+' => '',
	'Class:NetworkSocket/Attribute:rack_id' => 'Rack',
	'Class:NetworkSocket/Attribute:rack_id+' => 'Rack containing the patch panel',
	'Class:NetworkSocket/Attribute:rack_name' => 'Rack name',
	'Class:NetworkSocket/Attribute:rack_name+' => '',
	'Class:NetworkSocket/Attribute:patchpanel_id' => 'Patch panel',
	'Class:NetworkSocket/Attribute:patchpanel_id+' => 'Patch panel hosting the network socket',
	'Class:NetworkSocket/Attribute:patchpanel_name' => 'Patch panel name',
	'Class:NetworkSocket/Attribute:patchpanel_name+' => '',
	'Class:NetworkSocket/Attribute:comment' => 'Comment',
	'Class:NetworkSocket/Attribute:comment+' => '',
	'Class:NetworkSocket/Attribute:connectableci_id' => 'Device',
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Device connected to the network socket',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Device name',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Physical interface',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Physical interface through which the device is connected to the network socket',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Physical interface name',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Network socket',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Remote network socket connected to the network socket',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Network socket name',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:interfaceconnector_id' => 'Connector',
	'Class:NetworkSocket/Attribute:interfaceconnector_id+' => 'Connector type of the network socket',
	'Class:NetworkSocket/Attribute:interfaceconnector_name' => 'Connector name',
	'Class:NetworkSocket/Attribute:interfaceconnector_name+' => '',

));


