<?php
/*
 * @copyright   Copyright (C) 2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'teemip-cable-mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: IPConfig
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs' => 'Allow cabling toward another organizations',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs+' => 'Allow a patch panel of the organization to be connected to a remote patch panel belonging to another organization through the backend cables of its network sockets',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes' => 'Yes',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes+' => '',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no' => 'No',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no+' => '',
));

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
	'Class:CableCategory/Name' => '%1$s - %2$s',
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
	'Class:NetworkCable/Name' => '%1$s',
	'Class:NetworkCable:baseinfo' => 'General Information',
	'Class:NetworkCable:capacity' => 'Capacities',
	'Class:NetworkCable:endpoints' => 'Connecting Points',
	'Class:NetworkCable/Attribute:finalclass' => 'Class',
	'Class:NetworkCable/Attribute:finalclass+' => '',
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
	'Class:NetworkCable/Attribute:label' => 'Label',
	'Class:NetworkCable/Attribute:label+' => 'Label attached to the cable',
	'Class:NetworkCable/Attribute:comment' => 'Comment',
	'Class:NetworkCable/Attribute:comment+' => '',
	'Class:NetworkCable/Attribute:documents_list' => 'Documents',
	'Class:NetworkCable/Attribute:documents_list+' => 'All the documents linked to this network cable',
));

//
// Class: FrontEndNetworkCable
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:FrontEndNetworkCable' => 'Front End Network Cable',
	'Class:FrontEndNetworkCable+' => 'Cable that connects 2 network sockets through their front end',
	'Class:FrontEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id' => 'Network socket #1 - Front end',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id+' => 'First network socket front end that the cable is connected to',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name' => 'Network socket #1 name',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name+' => '',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id' => 'Network socket #2 - Front end',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id+' => 'Second network socket front end that the cable is connected to',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name' => 'Network socket #2 name',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name+' => '',
));

//
// Class: BackEndNetworkCable
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:BackEndNetworkCable' => 'Back End Network Cable',
	'Class:BackEndNetworkCable+' => 'Cable that connects 2 network sockets through their back end',
	'Class:BackEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id' => 'Network socket #1 - Back end',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id+' => 'First network socket back end that the cable is connected to',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name' => 'Network socket #1 name',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name+' => '',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id' => 'Network socket #2 - Back end',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id+' => 'Second network socket back end that the cable is connected to',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name' => 'Network socket #2 name',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name+' => '',
));

//
// Class: DeviceNetworkCable
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:DeviceNetworkCable' => 'Device Network Cable',
	'Class:DeviceNetworkCable+' => 'Cable that connects a network socket front end to a physical interface',
	'Class:DeviceNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:DeviceNetworkCable/Attribute:networksocket_id' => 'Network socket - Front end',
	'Class:DeviceNetworkCable/Attribute:networksocket_id+' => 'Network socket front end that the cable is connected to',
	'Class:DeviceNetworkCable/Attribute:networksocket_name' => 'Network socket name',
	'Class:DeviceNetworkCable/Attribute:networksocket_name+' => '',
	'Class:DeviceNetworkCable/Attribute:connectableci_id' => 'Device',
	'Class:DeviceNetworkCable/Attribute:connectableci_id+' => 'Device hosting the physical interface that the cable is connected to',
	'Class:DeviceNetworkCable/Attribute:connectableci_name' => 'Device name',
	'Class:DeviceNetworkCable/Attribute:connectableci_name+' => '',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id' => 'Physical interface',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id+' => 'Physical interface that the cable is connected to',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name' => 'Physical interface name',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name+' => '',
));

//
// Class: DirectNetworkCable
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:DirectNetworkCable' => 'Direct Network Cable',
	'Class:DirectNetworkCable+' => 'Cable that connects together the physical interface of 2 devices',
	'Class:DirectNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:DirectNetworkCable/Attribute:connectableci1_id' => 'Device #1',
	'Class:DirectNetworkCable/Attribute:connectableci1_id+' => 'Device hosting the physical interface #1 that the cable is connected to',
	'Class:DirectNetworkCable/Attribute:connectableci1_name' => 'Device #1 name',
	'Class:DirectNetworkCable/Attribute:connectableci1_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id' => 'Physical interface #1',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id+' => 'Physical interface of the device #1 that the cable is connected to',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name' => 'Physical interface #1 name',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name+' => '',
	'Class:DirectNetworkCable/Attribute:connectableci2_id' => 'Device #2',
	'Class:DirectNetworkCable/Attribute:connectableci2_id+' => 'Device hosting the physical interface #2 that the cable is connected to',
	'Class:DirectNetworkCable/Attribute:connectableci2_name' => 'Device #2 name',
	'Class:DirectNetworkCable/Attribute:connectableci2_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id' => 'Physical interface #2',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id+' => 'Physical interface of the device #2 that the cable is connected to',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name' => 'Physical interface #2 name',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name+' => '',
));

//
// Class: BreakoutCable
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:BreakoutCable' => 'Breakout Cable',
	'Class:BreakoutCable+' => 'Cable that combines multiple links to connect several sockets of different patch panels',
	'Class:BreakoutCable/Name' => '%1$s <-> %2$s - %3$s',
	'Class:BreakoutCable/Attribute:capacity' => 'Capacity',
	'Class:BreakoutCable/Attribute:capacity+' => 'Total number of links that the breakout cable is combining',
	'Class:BreakoutCable/Attribute:freelinks' => 'Free Links',
	'Class:BreakoutCable/Attribute:freelinks+' => 'Number of links that remain available within the breakout cable',
	'Class:BreakoutCable/Attribute:rack1_id' => 'Rack #1',
	'Class:BreakoutCable/Attribute:rack1_id+' => 'Rack hosting the different source patch panels that the cable is connected to',
	'Class:BreakoutCable/Attribute:rack1_name' => 'Rack #1 name',
	'Class:BreakoutCable/Attribute:rack1_name+' => '',
	'Class:BreakoutCable/Attribute:rack2_id' => 'Rack #2',
	'Class:BreakoutCable/Attribute:rack2_id+' => 'Rack hosting the different destination patch panels that the cable is connected to',
	'Class:BreakoutCable/Attribute:rack2_name' => 'Rack #2 name',
	'Class:BreakoutCable/Attribute:rack2_name+' => '',
	'Class:BreakoutCable/Attribute:patchpanels_list' => 'Patch Panels',
	'Class:BreakoutCable/Attribute:patchpanels_list+' => 'List of patch panels that the break out cable is connected to',
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
	'Class:NetworkSocket/Attribute:external_ref' => 'External reference',
	'Class:NetworkSocket/Attribute:external_ref+' => 'Reference that may be relevant for a third party',
	'Class:NetworkSocket/Attribute:status' => 'Status',
	'Class:NetworkSocket/Attribute:status+' => 'Active: when both the front end and the back end are defined,
	 Ready: when only the back end is defined,
	 Inactive: All other cases.',
	'Class:NetworkSocket/Attribute:status/Value:active' => 'Active',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => 'Inactive',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:status/Value:ready' => 'Ready',
	'Class:NetworkSocket/Attribute:status/Value:ready+' => '',
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
	'Class:NetworkSocket/Attribute:org_id+' => 'Organization that the location belongs to. It defines as well the socket\'s organization.',
	'Class:NetworkSocket/Attribute:comment' => 'Comment',
	'Class:NetworkSocket/Attribute:comment+' => '',
	'Class:NetworkSocket/Attribute:connectableci_id' => 'Device',
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Device connected to the network socket. This attribute cannot be filled at the same time as the Network socket or the Cross connect ones',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Device name',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Physical interface',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Physical interface through which the device is connected to the network socket',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Physical interface name',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Network socket',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Remote network socket connected to the network socket. This attribute cannot be filled at the same time as the Device ones',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Network socket name',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:crossconnect_id' => 'Cross Connect',
	'Class:NetworkSocket/Attribute:crossconnect_id+' => 'Cross Connect using the network socket. This attribute cannot be filled at the same time as the Device one',
	'Class:NetworkSocket/Attribute:crossconnect_name' => 'Cross Connect name',
	'Class:NetworkSocket/Attribute:crossconnect_name+' => '',
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
	'Class:PatchPanel:rackinfo' => 'Rack Information',
	'Class:PatchPanel/Attribute:external_ref' => 'External reference',
	'Class:PatchPanel/Attribute:external_ref+' => 'Reference that may be relevant for a third party',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack hosting the patch panel',
	'Class:PatchPanel/Attribute:rack_name' => 'Rack name',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:enclosure_id' => 'Enclosure',
	'Class:PatchPanel/Attribute:enclosure_id+' => 'Enclosure hosting the patch panel',
	'Class:PatchPanel/Attribute:enclosure_name' => 'Enclosure name',
	'Class:PatchPanel/Attribute:enclosure_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Capacity',
	'Class:PatchPanel/Attribute:capacity+' => 'Number of network sockets that the panel can host',
	'Class:PatchPanel/Attribute:free_sockets' => 'Free sockets',
	'Class:PatchPanel/Attribute:free_sockets+' => 'Number of network sockets still available on the panel: not created yes, inactive or ready',
	'Class:PatchPanel/Attribute:ready_sockets' => 'Ready sockets',
	'Class:PatchPanel/Attribute:ready_sockets+' => 'Number of network sockets with status \'ready\'',
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
// Class: lnkBreakoutCableToPatchPanel
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:lnkBreakoutCableToPatchPanel' => 'Link Breakout Cable / Patch Panel',
	'Class:lnkBreakoutCableToPatchPanel+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Name' => '%1$s / %2$s',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id' => 'Breakout Cable',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label' => 'Breakout Cable Label',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id' => 'Patch Panel',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name' => 'Patch Panel name',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks' => 'Used Links',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks+' => '',
));

//
// Class: CrossConnect
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:CrossConnect' => 'Cross Connect',
	'Class:CrossConnect+' => 'Cabling necessary to establish a direct link between two separate hardware units',
	'Class:CrossConnect:baseinfo' => 'General Information',
	'Class:CrossConnect:localinfo' => 'Local Unit Information',
	'Class:CrossConnect:remoteinfo' => 'Peer Unit Information',
	'Class:CrossConnect/Tab:wiring' => 'Wiring',
	'Class:CrossConnect/Tab:wiring+' => 'Display the wiring layout between the local and peer patch panels',
	'Class:CrossConnect/Attribute:ref' => 'Reference',
	'Class:CrossConnect/Attribute:ref+' => 'Reference of the cross connect for the local organization',
	'Class:CrossConnect/Attribute:remote_org_id' => 'Peer organization',
	'Class:CrossConnect/Attribute:remote_org_id+' => 'Peer organization for the cross connect',
	'Class:CrossConnect/Attribute:remote_ref' => 'Peer reference',
	'Class:CrossConnect/Attribute:remote_ref+' => 'Reference of the cross connect for the peer organization',
	'Class:CrossConnect/Attribute:status' => 'Status',
	'Class:CrossConnect/Attribute:status+' => 'Operational status of the cross connect',
	'Class:CrossConnect/Attribute:status/Value:construction' => 'Construction',
	'Class:CrossConnect/Attribute:status/Value:construction+' => '',
	'Class:CrossConnect/Attribute:status/Value:production' => 'Production',
	'Class:CrossConnect/Attribute:status/Value:production+' => '',
	'Class:CrossConnect/Attribute:status/Value:cancellation' => 'Cancellation',
	'Class:CrossConnect/Attribute:status/Value:cancellation+' => '',
	'Class:CrossConnect/Attribute:status/Value:obsolete' => 'Obsolete',
	'Class:CrossConnect/Attribute:status/Value:obsolete+' => '',
	'Class:CrossConnect/Attribute:cablecategory_id' => 'Cable category & type',
	'Class:CrossConnect/Attribute:cablecategory_id+' => 'Category and type of the cables linking the 2 peers',
	'Class:CrossConnect/Attribute:cablecategory_name' => 'Cable category name',
	'Class:CrossConnect/Attribute:cablecategory_name+' => '',
	'Class:CrossConnect/Attribute:location_id' => 'Location',
	'Class:CrossConnect/Attribute:location_id+' => 'Location of the rack containing the patch panel and the network socket(s) of the local end of the cross connect',
	'Class:CrossConnect/Attribute:location_name' => 'Location name',
	'Class:CrossConnect/Attribute:location_name+' => '',
	'Class:CrossConnect/Attribute:rack_id' => 'Rack',
	'Class:CrossConnect/Attribute:rack_id+' => 'Rack hosting the patch panel',
	'Class:CrossConnect/Attribute:rack_name' => 'Rack name',
	'Class:CrossConnect/Attribute:rack_name+' => '',
	'Class:CrossConnect/Attribute:patchpanel_id' => 'Patch panel',
	'Class:CrossConnect/Attribute:patchpanel_id+' => 'Patch panel hosting the network socket(s)',
	'Class:CrossConnect/Attribute:patchpanel_name' => 'Patch panel name',
	'Class:CrossConnect/Attribute:patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:networksocket1_id' => 'Primary Network socket',
	'Class:CrossConnect/Attribute:networksocket1_id+' => 'Primary network socket at the local end of the cross connect',
	'Class:CrossConnect/Attribute:networksocket1_name' => 'Primary network socket name',
	'Class:CrossConnect/Attribute:networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:networksocket2_id' => 'Secondary Network socket',
	'Class:CrossConnect/Attribute:networksocket2_id+' => 'Second and optional network socket used in case of dual connection',
	'Class:CrossConnect/Attribute:networksocket2_name' => 'Secondary network socket name',
	'Class:CrossConnect/Attribute:networksocket2_name+' => '',
	'Class:CrossConnect/Attribute:remote_location_id' => 'Peer location',
	'Class:CrossConnect/Attribute:remote_location_id+' => 'Location of the rack containing the patch panel and the network socket(s) of the peer end of the cross connect',
	'Class:CrossConnect/Attribute:remote_location_name' => 'Peer location name',
	'Class:CrossConnect/Attribute:remote_location_name+' => '',
	'Class:CrossConnect/Attribute:remote_rack_id' => 'Peer rack',
	'Class:CrossConnect/Attribute:remote_rack_id+' => 'Peer rack hosting the patch panel',
	'Class:CrossConnect/Attribute:remote_rack_name' => 'Peer rack name',
	'Class:CrossConnect/Attribute:remote_rack_name+' => '',
	'Class:CrossConnect/Attribute:remote_patchpanel_id' => 'Peer patch panel',
	'Class:CrossConnect/Attribute:remote_patchpanel_id+' => 'Peer patch panel hosting the network socket(s)',
	'Class:CrossConnect/Attribute:remote_patchpanel_name' => 'Peer patch panel name',
	'Class:CrossConnect/Attribute:remote_patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket1_id' => 'Peer primary Network socket',
	'Class:CrossConnect/Attribute:remote_networksocket1_id+' => 'Primary network socket peering with the primary one',
	'Class:CrossConnect/Attribute:remote_networksocket1_name' => 'Peer primary network socket name',
	'Class:CrossConnect/Attribute:remote_networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket2_id' => 'Peer secondary Network sockets',
	'Class:CrossConnect/Attribute:remote_networksocket2_id+' => 'Second network socket peering with the secondary one',
	'Class:CrossConnect/Attribute:remote_networksocket2_name' => 'Peer secondary network socket name',
	'Class:CrossConnect/Attribute:remote_networksocket2_name+' => '',
));

//
// Class: PhysicalInterface
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Network socket',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Remote network socket connected to the interface. This attribute cannot be filled at the same time as the remote device.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id' => 'Remote device',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id+' => 'Remote device connected to the interface. This attribute cannot be filled at the same time as the network socket.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name' => 'Name of the remote device',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name+' => '',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id' => 'Remote physical interface',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id+' => 'Physical interface used on the remote device for the connection.',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name' => 'Name of the remote physical interface',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name+' => '',
	'Class:PhysicalInterface/Tab:cables_list' => 'Cables',
	'Class:PhysicalInterface/Tab:cables_list+' => 'List of all cables connected to the physical interface',
));

//
// Class: Rack
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:Rack/Attribute:patchpanels_list' => 'Patch Panels',
	'Class:Rack/Attribute:patchpanels_list+' => 'List of all patch panels hosted by the rack',
));

//
// Menus & actions
//

Dict::Add('EN US', 'English', 'English', array(
	'Menu:TeemIpNetworking:Cabling' => 'Cabling',

	'Relation:wiring/Description' => 'Wiring layout',
	'Relation:wiring/DownStream' => 'Wiring...',
	'Relation:wiring/DownStream+' => 'Wiring layout',
	'Relation:wiring/UpStream' => 'Wiring...',
	'Relation:wiring/UpStream+' => 'Wiring layout',

	'teemip-cable-mgmt/Operation:CreateBackEndNetworkCables/Title' => 'Create Back End Cables',
	'teemip-cable-mgmt/Operation:ListAvailableWirings/Title' => 'Wiring paths',

	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'A cable is already connecting the same network sockets',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel' => 'A patch panel needs to be selected when the network socket belongs to a rack!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'A network socket cannot be connected to BOTH an interface and another network socket!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndCrossConnect' => 'A network socket cannot be connected to BOTH an interface and a cross connect!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToSocketAndCrossConnect' => 'A network socket cannot be connected to BOTH a network socket and a cross connect!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'A network socket cannot be connected to the same remote socket through both its network socket and back end socket connectors!',

	'UI:CableManagement:Action:CreateOrUpdate:PhysicalInterface:NoDualSocketAndCIAllowed' => 'A physical interface cannot be connected to both a network socket and a remote device!',

	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets' => 'Create network sockets',
	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoLocationDefined' => 'Network sockets cannot be created because no location is set for the patch panel!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables' => 'Create back end network cables',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Title' => 'Create back end network cables for patch panel: %1$s',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Helper' => 'Select a remote patch panel',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelAvailable' => 'No remote Patch panel is actually available for the operation!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelExists' => 'Back End cables cannot be created: remote Patch Panel %1$s doesn\'t exist!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity' => 'Back End cables cannot be created: remote Patch Panel %1$s doesn\'t have any capacity!',

	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotInBreakoutCableRacks' => 'The patch panel %1$s doesn\'t belong to any of the racks that the breakout cable connects!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotEnoughCapacity' => 'The patch panel %1$s doesn\'t have enough capacity for the number of links requested',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:BreakoutCableNotEnoughCapacity' => 'The breakout cable doesn\'t have enough capacity for the number of links requested by the patch panel %1$s!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:NotEnoughCapacityInBreakoutCableRacks' => 'There is not enough capacity in the breakout cable for the required links!',

	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothMainSocketsFilled' => 'The cross connect cannot move to production without both primary network sockets filled!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothSecondarySocketsFilled' => 'If one secondary network socket is set, the other one must be set as well!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings' => 'Find wiring paths',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Title' => 'List of possible wiring paths for %1$s: %2$s',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Helper' => 'Select and activate a path',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxRackLevelIsTooShort' => 'The required maximum number of racks to cross (%1$s) cannot be lower than 1!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxOffersIsTooLow' => 'The number of expected offers (%1$s) canot be lower than 1!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:NumberOfOffers' => '%1$s paths found out of %2$s requested from ',
));
