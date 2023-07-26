<?php
/*
 * @copyright   Copyright (C) 2023 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'teemip-cable-mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: CableType
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:CableType' => 'Kabel-Typ',
	'Class:CableType+' => '',
	'Class:CableType/Attribute:description' => 'Beschreibung',
	'Class:CableType/Attribute:description+' => '',
	'Class:CableType/Attribute:cablecategories_list' => 'Kabel-Kategorien',
	'Class:CableType/Attribute:cablecategories_list+' => '',
));

//
// Class: CableCategory
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:CableCategory' => 'Kabel-Kategorie',
	'Class:CableCategory+' => '',
	'Class:CableCategory/Attribute:cabletype_id' => 'Kabel-Typ',
	'Class:CableCategory/Attribute:cabletype_id+' => '',
	'Class:CableCategory/Attribute:description' => 'Beschreibung',
	'Class:CableCategory/Attribute:description+' => '',
));

//
// Class: NetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:NetworkCable' => 'Netzwerk-Kabel',
	'Class:NetworkCable+' => '',
	'Class:NetworkCable/Name' => '%1$s <-> %2$s',
	'Class:NetworkCable:baseinfo' => 'Allgemeine Informationen',
	'Class:NetworkCable:endpoints' => 'Verbindungspunkte',
	'Class:NetworkCable/Attribute:cabletype_id' => 'Kabel-Typ',
	'Class:NetworkCable/Attribute:cabletype_id+' => '',
	'Class:NetworkCable/Attribute:cabletype_name' => 'Name Kabel-Typ',
	'Class:NetworkCable/Attribute:cabletype_name+' => '',
	'Class:NetworkCable/Attribute:cablecategory_id' => 'Kabel-Kategorie',
	'Class:NetworkCable/Attribute:cablecategory_id+' => '',
	'Class:NetworkCable/Attribute:cablecategory_name' => 'Name Kabel-Kategorie',
	'Class:NetworkCable/Attribute:cablecategory_name+' => '',
	'Class:NetworkCable/Attribute:length' => 'Laenge (m)',
	'Class:NetworkCable/Attribute:length+' => 'Laenge des Kabels, in Meter',
	'Class:NetworkCable/Attribute:label' => 'Etikett',
	'Class:NetworkCable/Attribute:label+' => 'Am Kabel angebrachtes Etikett',
	'Class:NetworkCable/Attribute:comment' => 'Kommentar',
	'Class:NetworkCable/Attribute:comment+' => '',
));

//
// Class: FrontEndNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:FrontEndNetworkCable' => 'Netzwerk-Kabel (Vorderseite)',
	'Class:FrontEndNetworkCable+' => 'Kabel, welches zwei Netzwerk-Dosen durch ihre Vorderseite verbindet',
	'Class:FrontEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id' => 'Netzwerk-Dose #1 - Vorderseite',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id+' => 'Erste Netzwerk-Dose (Vorderseite), mit welcher das Kabel verbunden ist',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name' => 'Name Netzwerk-Dose #1',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name+' => '',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id' => 'Netzwerk-Dose #2 - Vorderseite',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id+' => 'Zweite Netzwerk-Dose (Vorderseite), mit welcher das Kabel verbunden ist',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name' => 'Name Netzwerk-Dose #2',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name+' => '',
));

//
// Class: BackEndNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:BackEndNetworkCable' => 'Netzwerk-Kabel (Rückseite)',
	'Class:BackEndNetworkCable+' => 'Kabel, welches zwei Netzwerk-Dosen durch ihre Rückseite verbindet',
	'Class:BackEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id' => 'Netzwerk-Dose #1 - Rückseite',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id+' => 'Erste Netzwerk-Dose (Rückseite), mit welcher das Kabel verbunden ist',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name' => 'Name Netzwerk-Dose #1',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name+' => '',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id' => 'Netzwerk-Dose #2 - Rückseite',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id+' => 'Zweite Netzwerk-Dose (Rückseite), mit welcher das Kabel verbunden ist',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name' => 'Name Netzwerk-Dose #2',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name+' => '',
));

//
// Class: DeviceNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:DeviceNetworkCable' => 'Geräte Netzwerk-Kabel',
	'Class:DeviceNetworkCable+' => 'Kabel, welches eine Netzwerk-Dose (Vorderseite) mit einer physikalischen Schnittstelle (Interface) verbindet',
	'Class:DeviceNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:DeviceNetworkCable/Attribute:networksocket_id' => 'Netzwerk-Dose - Vorderseite',
	'Class:DeviceNetworkCable/Attribute:networksocket_id+' => 'Netzwerk-Dose (Vorderseite), mit welcher das Kabel verbunden ist',
	'Class:DeviceNetworkCable/Attribute:networksocket_name' => 'Name Netzwerk-Dose',
	'Class:DeviceNetworkCable/Attribute:networksocket_name+' => '',
	'Class:DeviceNetworkCable/Attribute:connectableci_id' => 'Gerät',
	'Class:DeviceNetworkCable/Attribute:connectableci_id+' => 'Gerät, gehörend zur physikalischen Schnittstelle (Interface), welches mit dem Kabel verbunden ist',
	'Class:DeviceNetworkCable/Attribute:connectableci_name' => 'Name Gerät',
	'Class:DeviceNetworkCable/Attribute:connectableci_name+' => '',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id' => 'Physikalische Schnittstelle (Interface)',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id+' => 'Physikalische Schnittstelle (Interface) mit welchem das Kabel verbunden ist',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name' => 'Name physikalische Schnittstelle',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name+' => '',
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
	'Class:NetworkSocket/Attribute:org_id+' => 'Organisation, zu der der Standort gehört. Es definiert auch die Organisation der Netzwerk-Dose.',
	'Class:NetworkSocket/Attribute:comment' => 'Kommentar',
	'Class:NetworkSocket/Attribute:comment+' => '',
	'Class:NetworkSocket/Attribute:connectableci_id' => 'Gerät',
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Gerät, welches mit der Netzwerk-Dose verbunden ist. Dieses Feld kann nicht gleichzeitig mit dem Feld der Netzwerk-Dose ausgefüllt sein.',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Name Gerät',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Physikalische Schnittstelle (Interface)',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Physikalische Schnittstelle (Interface) durch welches das Gerät mit der Netzwerk-Dose verbunden ist',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Name physikalische Schnittstelle',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Netzwerk-Dose',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Entfernte Netzwerk-Dose, welche mit der Netzwerk-Dose verbunden ist. Dieses Feld kann nicht gleichzeitig mit dem Geräte-Feld ausgefüllt sein.',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Netzwerk-Dosen Name',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:backendsocket_id' => 'Rückseitige Netzwerk-Dose',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => 'Entfernte Netzwerk-Dose, welche durch rückseitiges Kabel verbunden ist',
	'Class:NetworkSocket/Tab:cables_list' => 'Kabel',
	'Class:NetworkSocket/Tab:cables_list+' => 'Liste aller Kabel, welche mit der Netzwerk-Dose verbunden sind',
));

//
// Class: PatchPanel
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PatchPanel' => 'Patch Panel',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => 'Allgemeine Informationen',
	'Class:PatchPanel:moreinfo' => 'Mehr Informationen',
	'Class:PatchPanel:rackinfo' => 'Rack Informationen',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack, welches zum Patch Panel gehört',
	'Class:PatchPanel/Attribute:rack_name' => 'Rack Name',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Kapazität',
	'Class:PatchPanel/Attribute:capacity+' => 'Anzahl der Netzwerk-Dosen am Patch Panel',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Netzwerk-Dosen',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'Liste aller Netzwerk-Dosen des Patch Panel',
	'Class:PatchPanel/Tab:cables_list' => 'Kabel',
	'Class:PatchPanel/Tab:cables_list+' => 'Liste aller Kabel, welche mit einer Netzwerk-Dose von diesem Patch Panel verbunden sind',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Nachbar-Anschlüsse der Vorderseite des Panels',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'Liste aller Patch Panels verbunden mit dem aktuellen Panel durch die vorderseitige Netzwerk-Dose der angeschlossenen Dosen',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Nachbar-Anschlüsse der Rückseite des Panels',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'Liste aller Patch Panels verbunden mit dem aktuellen Panel durch die rückseitige Netzwerk-Dose der angeschlossenen Dosen',
));

//
// Class: PhysicalInterface
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Netzwerk-Dose',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Entfernte Netzwerk-Dose, welche mit der Schnittstelle (Interface) verbunden ist',
	'Class:PhysicalInterface/Attribute:cable' => 'Kabel',
	'Class:PhysicalInterface/Attribute:cable+' => 'Geräte-Kabel, welches mit der Schnittstelle (Interface) verbunden ist',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id' => 'Remote-Gerät',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id+' => 'An die Schnittstelle (Interface) angeschlossenes Remote-Gerät. Dieses Attribut kann nicht gleichzeitig mit dem Netzwerk-Socket gefüllt werden.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name' => 'Name des Remote-Geräts',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name+' => '',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id' => 'Entfernte Physikalische Schnittstelle',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id+' => 'Physikalische Schnittstelle (Interface), welches an dem entfernten Gerät für die Verbindung verwendet wird',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name' => 'Name der entfernten physikalischen Schnittstelle',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name+' => '',
));

//
// Class: Rack
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:Rack/Attribute:patchpanels_list' => 'Patch Panels',
	'Class:Rack/Attribute:patchpanels_list+' => 'Liste aller Patch Panels, welche mit dem Patch Panel verbunden sind',
));

//
// Actions
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'Ein Kabel ist bereits mit den gleichen Netzwerk-Dosen verbunden',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel' => 'Ein Patch Panel muss ausgewählt werden, wenn die Netzwerkdose zu einem Rack gehört!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'Eine Netzwerk-Dose kann nicht mit beidem, einem Interface und einer anderen Netzwerk-Dose, verbunden sein!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'Eine Netzwerk-Dose kann nicht mit mit der selben entfernten Netzwerk-Dose mit seiner vorderseitigen und seiner rückseitigen Konnektoren verbunden sein!',
	'UI:CableManagement:Action:CreateOrUpdate:PhysicalInterface:NoDualSocketAndCIAllowed' => 'Eine physikalische Schnittstelle (Interface) kann nicht gleichzeitig mit einer Netzwerk-Dose und einem entfernten Gerät verbunden werden!',
));

//////////////////////////////////////////////////////////////////////
// Relations
//////////////////////////////////////////////////////////////////////
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Relation:wiring/Description' => 'Verkabelungs-Layout',
	'Relation:wiring/DownStream' => 'Verkabelung (DownStream)...',
	'Relation:wiring/DownStream+' => 'Verkabelungs-Layout (DownStream)',
	'Relation:wiring/UpStream' => 'Verkabelung (UpStream)...',
	'Relation:wiring/UpStream+' => 'Verkabelungs-Layout (UpStream)',
));