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
// Class: CableCategory
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:CableCategory' => 'Cable Type',
	'Class:CableCategory+' => '',
	'Class:CableCategory/Attribute:cabletype_id' => 'Cable type',
	'Class:CableCategory/Attribute:cabletype_id+' => '',
	'Class:CableCategory/Attribute:description' => 'Description',
	'Class:CableCategory/Attribute:description+' => '',
));

//
// Class: CableType
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:CableType' => 'Cable Type',
	'Class:CableType+' => '',
	'Class:CableType/Attribute:description' => 'Description',
	'Class:CableType/Attribute:description+' => '',
	'Class:CableType/Attribute:cablecategories_list' => 'Cable categories',
	'Class:CableType/Attribute:cablecategories_list+' => '',
));

//
// Class: NetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
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
));

//
// Class: NetworkSocket
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:NetworkSocket' => 'Netzwerk-Dose',
	'Class:NetworkSocket+' => '',
	'Class:NetworkSocket:baseinfo' => 'Allgemeine Informationen',
	'Class:NetworkSocket:frontendinfo' => 'Vorderseitige Informationen',
	'Class:NetworkSocket:backendinfo' => 'Rückseitige Informationen',
	'Class:NetworkSocket:moreinfo' => 'Mehr Informationen',
	'Class:NetworkSocket/Attribute:code' => 'Kennung',
	'Class:NetworkSocket/Attribute:code+' => 'Kennung, die benutzt wird um die Netzwerk-Dose innerhalb des Patch Panels oder des Standorts zu identifizieren',
	'Class:NetworkSocket/Attribute:status' => 'Status',
	'Class:NetworkSocket/Attribute:status+' => '',
	'Class:NetworkSocket/Attribute:status/Value:active' => 'Aktiv',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => 'Inaktiv',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:location_id' => 'Standort',
	'Class:NetworkSocket/Attribute:location_id+' => 'Standort des Racks, welches dem Patch Panel und der Netzwerk-Dose zugeordnet ist, oder des Raumes der Netzwerk-Dose',
	'Class:NetworkSocket/Attribute:location_name' => 'Standort Name',
	'Class:NetworkSocket/Attribute:location_name+' => '',
	'Class:NetworkSocket/Attribute:rack_id' => 'Rack',
	'Class:NetworkSocket/Attribute:rack_id+' => 'Rack, welches zum Patch Panel gehört',
	'Class:NetworkSocket/Attribute:rack_name' => 'Rack Name',
	'Class:NetworkSocket/Attribute:rack_name+' => '',
	'Class:NetworkSocket/Attribute:patchpanel_id' => 'Patch Panel',
	'Class:NetworkSocket/Attribute:patchpanel_id+' => 'Patch Panel, welches zur Netzwerk-Dose gehört',
	'Class:NetworkSocket/Attribute:patchpanel_name' => 'Patch Panel Name',
	'Class:NetworkSocket/Attribute:patchpanel_name+' => '',
	'Class:NetworkSocket/Attribute:comment' => 'Kommentar',
	'Class:NetworkSocket/Attribute:comment+' => '',
	'Class:NetworkSocket/Attribute:connectableci_id' => 'Gerät',
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Gerät, welches mit der Netzwerk-Dose verbunden ist. Dieses Feld kann nicht gleichzeitig mit dem Feld der Netzwerk-Dose ausgefüllt sein.',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Gerätename',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Physikalisches Interface',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Physikalisches Interface durch welches das Gerät mit der Netzwerk-Dose verbunden ist',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Name des physikalischen Interface',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Netzwerk-Dose',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Entfernte Netzwerk-Dose, welche mit der Netzwerk-Dose verbunden ist. Dieses Feld kann nicht gleichzeitig mit dem Geräte-Feld ausgefüllt sein.',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Netzwerk-Dosen Name',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:backendsocket_id' => 'Rückseitige Netzwerk-Dose',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => 'Entfernte Netzwerk-Dose, welche durch rückseitige Kabel verbunden ist',
));

//
// Class: PatchPanel
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PatchPanel' => 'Patch Panel',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => 'Allgemeine Informationen',
	'Class:PatchPanel:moreinfo' => 'Mehr Informationen',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack, welches zum Patch Panel gehört',
	'Class:PatchPanel/Attribute:rack_name' => 'Rack Name',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Kapazität',
	'Class:PatchPanel/Attribute:capacity+' => 'Anzahl der Netzwerk-Dosen am Patch Panel',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Netzwerk-Dosen',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'Liste aller Netzwerk-Dosen des Patch Panel',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Nachbar-Anschlüsse der Vorderseite des Panels',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'Liste aller Patch Panels verbunden mit dem aktuellen Panel durch die Netzwerk-Dose der angeschlossenen Dosen',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Nachbar-Anschlüsse der Rückseite des Panels',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'Liste aller Patch Panels verbunden mit dem aktuellen Panel durch die rückseitige Netzwerk-Dose der angeschlossenen Dosen',
));

//
// Class: PhysicalInterface
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Netzwerk-Dose',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Entfernte Netzwerk-Dose, welche mit dem Interface verbunden ist',
));

//
// Actions
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'A cable is already connecting the same network sockets',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'Eine Netzwerk-Dose kann NICHT mit BEIDEM, einem Interface und einer anderen Netzwerk-Dose, verbunden sein!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'Eine Netzwerk-Dose kann nicht mit mit der selben entfernten Netzwerk-Dose mit seiner vorderseitigen und seiner rückseitigen Konnektoren verbunden sein!',
));