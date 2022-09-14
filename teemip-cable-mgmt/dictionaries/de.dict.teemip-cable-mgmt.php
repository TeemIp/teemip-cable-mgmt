<?php
/*
 * @copyright   Copyright (C) 2022 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'teemip-cable-mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: PatchPanel
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PatchPanel' => 'Patch Panel',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => 'General Information',
	'Class:PatchPanel:moreinfo' => 'More Information',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack hosting the patch panel',
	'Class:PatchPanel/Attribute:rack_name' => 'Rack name',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Capacity',
	'Class:PatchPanel/Attribute:capacity+' => 'Number of network socket on the panel',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Network sockets',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'List of all network sockets of the patch panel',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Peer front end panels',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'List of all patch panels connected to the current one through the network socket of its hosted sockets',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Peer back end panels',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'List of all patch panels connected to the current one through the back end network socket of its hosted sockets',
));

//
// Class: NetworkSocket
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:NetworkSocket' => 'Network Socket',
	'Class:NetworkSocket+' => '',
	'Class:NetworkSocket:baseinfo' => 'General Information',
	'Class:NetworkSocket:frontendinfo' => 'Front End Information',
	'Class:NetworkSocket:backendinfo' => 'Back End Information',
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
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Device connected to the network socket. This attribute cannot be filled at the same time as the Network socket one',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Device name',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Physical interface',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Physical interface through which the device is connected to the network socket',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Physical interface name',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Network socket',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Remote network socket connected to the network socket. This attribute cannot be filled at the same time as the Device one',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Network socket name',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:backendsocket_id' => 'Back end network socket',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => 'Remote network socket connected through back end cables',
));

//
// Class: PhysicalInterface
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Network socket',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Remote network socket connected to the interface',
));

//
// Actions
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'A network socket cannot be connected to BOTH an interface and another network socket!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'A network socket cannot be connected to the same remote socket through both its network socket and back end socket connectors!',
));
