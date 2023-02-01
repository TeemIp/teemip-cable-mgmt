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
// Class: CableType
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:CableType' => 'Cable Type',
	'Class:CableType+' => '',
	'Class:CableType/Attribute:description' => 'Description',
	'Class:CableType/Attribute:description+' => '',
	'Class:CableType/Attribute:cablecategories_list' => 'Cable categories',
	'Class:CableType/Attribute:cablecategories_list+' => '',
));

//
// Class: CableCategory
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:CableCategory' => 'Cable Category',
	'Class:CableCategory+' => '',
	'Class:CableCategory/Attribute:cabletype_id' => 'Cable type',
	'Class:CableCategory/Attribute:cabletype_id+' => '',
	'Class:CableCategory/Attribute:description' => 'Description',
	'Class:CableCategory/Attribute:description+' => '',
));

//
// Class: NetworkCable
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:NetworkCable' => 'Network Cable',
	'Class:NetworkCable+' => '',
	'Class:NetworkCable/Name' => '%1$s <-> %2$s',
	'Class:NetworkCable:baseinfo' => 'General Information',
	'Class:NetworkCable/Attribute:cabletype_id' => 'Cable type',
	'Class:NetworkCable/Attribute:cabletype_id+' => '',
	'Class:NetworkCable/Attribute:cabletype_name' => 'Cable type name',
	'Class:NetworkCable/Attribute:cabletype_name+' => '',
	'Class:NetworkCable/Attribute:cablecategory_id' => 'Cable category',
	'Class:NetworkCable/Attribute:cablecategory_id+' => '',
	'Class:NetworkCable/Attribute:cablecategory_name' => 'Cable category name',
	'Class:NetworkCable/Attribute:cablecategory_name+' => '',
	'Class:NetworkCable/Attribute:length' => 'Length (m)',
	'Class:NetworkCable/Attribute:length+' => 'Length of the cable, in meter',
	'Class:NetworkCable/Attribute:networksocket1_id' => 'Network socket #1',
	'Class:NetworkCable/Attribute:networksocket1_id+' => 'First network socket that the cable is connected to',
	'Class:NetworkCable/Attribute:networksocket1_name' => 'Network socket #1 name',
	'Class:NetworkCable/Attribute:networksocket1_name+' => '',
	'Class:NetworkCable/Attribute:networksocket2_id' => 'Network socket #2',
	'Class:NetworkCable/Attribute:networksocket2_id+' => 'Second network socket that the cable is connected to',
	'Class:NetworkCable/Attribute:networksocket2_name' => 'Network socket #2 name',
	'Class:NetworkCable/Attribute:networksocket2_name+' => '',
	'Class:NetworkCable/Attribute:label' => 'Label',
	'Class:NetworkCable/Attribute:label+' => 'Label attached to the cable',
	'Class:NetworkCable/Attribute:comment' => 'Comment',
	'Class:NetworkCable/Attribute:comment+' => '',
));

//
// Class: NetworkSocket
//

Dict::Add('EN US', 'English', 'English', array(
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
	'Class:NetworkSocket/Tab:cables_list' => 'Cables',
	'Class:NetworkSocket/Tab:cables_list+' => 'List of all cables connected to the network socket',
));

//
// Class: PatchPanel
//

Dict::Add('EN US', 'English', 'English', array(
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
	'Class:PatchPanel/Tab:cables_list' => 'Cables',
	'Class:PatchPanel/Tab:cables_list+' => 'List of all cables connected to a network socket hosted by the patch panel',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Peer front end panels',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'List of all patch panels connected to the current one through the network socket of its hosted sockets',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Peer back end panels',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'List of all patch panels connected to the current one through the back end network socket of its hosted sockets',
));

//
// Class: PhysicalInterface
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Network socket',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Remote network socket connected to the interface',
));

//
// Class: Rack
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:Rack/Attribute:patchpanels_list' => 'Patch Panels',
	'Class:Rack/Attribute:patchpanels_list+' => 'List of all patch panels hosted by the rack',
));

//
// Actions
//

Dict::Add('EN US', 'English', 'English', array(
	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'A cable is already connecting the same network sockets',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'A network socket cannot be connected to BOTH an interface and another network socket!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'A network socket cannot be connected to the same remote socket through both its network socket and back end socket connectors!',
));

//////////////////////////////////////////////////////////////////////
// Relations
//////////////////////////////////////////////////////////////////////
//

Dict::Add('EN US', 'English', 'English', array(
	'Relation:wiring/Description' => 'Wiring layout',
	'Relation:wiring/DownStream' => 'Wiring...',
	'Relation:wiring/DownStream+' => 'Wiring layout',
	'Relation:wiring/UpStream' => 'Wiring...',
	'Relation:wiring/UpStream+' => 'Wiring layout',
));
