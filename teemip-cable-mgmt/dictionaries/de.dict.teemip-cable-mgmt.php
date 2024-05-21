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

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs' => 'Allow cabling toward another organizations',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs+' => 'Allow a patch panel to be connected to a remote patch panel belonging to another organization through the backend cables of its network sockets',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes' => 'Ja',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes+' => '',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no' => 'Nein',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no+' => '',
));

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
	'Class:NetworkCable' => 'Netzwerkkabel',
	'Class:NetworkCable+' => '',
	'Class:NetworkCable:baseinfo' => 'Allgemeine Informationen',
	'Class:NetworkCable:capacity' => 'Kapazitäten',
	'Class:NetworkCable:endpoints' => 'Verbindungspunkte',
	'Class:NetworkCable/Attribute:finalclass' => 'Klasse',
	'Class:NetworkCable/Attribute:finalclass+' => '',
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
	'Class:NetworkCable/Attribute:documents_list' => 'Dokumente',
	'Class:NetworkCable/Attribute:documents_list+' => 'Alle Dokumente, die mit diesem Kabel verknüpft sind',
));

//
// Class: FrontEndNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:FrontEndNetworkCable' => 'Netzwerkkabel (Vorderseite)',
	'Class:FrontEndNetworkCable+' => 'Kabel, welches zwei Netzwerkdosen durch ihre Vorderseite verbindet',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id' => 'Netzwerkdose #1 - Vorderseite',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id+' => 'Erste Netzwerkdose (Vorderseite), mit welcher das Kabel verbunden ist',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name' => 'Name Netzwerkdose #1',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name+' => '',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id' => 'Netzwerkdose #2 - Vorderseite',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id+' => 'Zweite Netzwerkdose (Vorderseite), mit welcher das Kabel verbunden ist',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name' => 'Name Netzwerkdose #2',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name+' => '',
));

//
// Class: BackEndNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:BackEndNetworkCable' => 'Netzwerkkabel (Rückseite)',
	'Class:BackEndNetworkCable+' => 'Kabel, welches zwei Netzwerkdosen durch ihre Rückseite verbindet',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id' => 'Netzwerkdose #1 - Rückseite',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id+' => 'Erste Netzwerkdose (Rückseite), mit welcher das Kabel verbunden ist',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name' => 'Name Netzwerkdose #1',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name+' => '',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id' => 'Netzwerkdose #2 - Rückseite',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id+' => 'Zweite Netzwerkdose (Rückseite), mit welcher das Kabel verbunden ist',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name' => 'Name Netzwerkdose #2',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name+' => '',
));

//
// Class: DeviceNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:DeviceNetworkCable' => 'Geräte Netzwerkkabel',
	'Class:DeviceNetworkCable+' => 'Kabel, welches eine Netzwerkdose (Vorderseite) mit einer physikalischen Schnittstelle (Interface) verbindet',
	'Class:DeviceNetworkCable/Attribute:networksocket_id' => 'Netzwerkdose - Vorderseite',
	'Class:DeviceNetworkCable/Attribute:networksocket_id+' => 'Netzwerkdose (Vorderseite), mit welcher das Kabel verbunden ist',
	'Class:DeviceNetworkCable/Attribute:networksocket_name' => 'Name Netzwerkdose',
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
// Class: DirectNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:DirectNetworkCable' => 'Direktes Netzwerkkabel',
	'Class:DirectNetworkCable+' => 'Kabel, welches zwei physikalischen Schnittstellen (Interfaces) verbindet',
	'Class:DirectNetworkCable/Attribute:connectableci1_id' => 'Gerät #1',
	'Class:DirectNetworkCable/Attribute:connectableci1_id+' => 'Gerät, gehörend zur physikalischen Schnittstelle #1 (Interface), welches mit dem Kabel verbunden ist',
	'Class:DirectNetworkCable/Attribute:connectableci1_name' => 'Name Gerät #1',
	'Class:DirectNetworkCable/Attribute:connectableci1_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id' => 'Physikalische Schnittstelle (Interface) #1',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id+' => 'Physikalische Schnittstelle (Interface) #1 mit welchem das Kabel verbunden ist',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name' => 'Name physikalische Schnittstelle #1',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name+' => '',
	'Class:DirectNetworkCable/Attribute:connectableci2_id' => 'Gerät #2',
	'Class:DirectNetworkCable/Attribute:connectableci2_id+' => 'Gerät, gehörend zur physikalischen Schnittstelle #2 (Interface), welches mit dem Kabel verbunden ist',
	'Class:DirectNetworkCable/Attribute:connectableci2_name' => 'Name Gerät #2',
	'Class:DirectNetworkCable/Attribute:connectableci2_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id' => 'Physikalische Schnittstelle (Interface) #2',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id+' => 'Physikalische Schnittstelle (Interface) #2 mit welchem das Kabel verbunden ist',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name' => 'Name physikalische Schnittstelle #2',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name+' => '',
));

//
// Class: BreakoutCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:BreakoutCable' => 'Breakout-Kabel',
	'Class:BreakoutCable+' => 'Kabel, das mehrere Fasern kombiniert, um mehrere Buchsen verschiedener Patchpanels zu verbinden',
	'Class:BreakoutCable/Attribute:capacity' => 'Kapazität',
	'Class:BreakoutCable/Attribute:capacity+' => 'Gesamtzahl der Fasern, die das Breakout-Kabel kombiniert',
	'Class:BreakoutCable/Attribute:freelinks' => 'Freie Fasern',
	'Class:BreakoutCable/Attribute:freelinks+' => 'Anzahl verfügbare Fasern innerhalb des Breakout-Kabels',
	'Class:BreakoutCable/Attribute:rack1_id' => 'Rack #1',
	'Class:BreakoutCable/Attribute:rack1_id+' => 'Rack, in dem sich die verschiedenen Quell-Patchpanels befinden, an die das Breakout-Kabel angeschlossen ist',
	'Class:BreakoutCable/Attribute:rack1_name' => 'Rack #1 name',
	'Class:BreakoutCable/Attribute:rack1_name+' => '',
	'Class:BreakoutCable/Attribute:rack2_id' => 'Rack #2',
	'Class:BreakoutCable/Attribute:rack2_id+' => 'Rack, in dem sich die verschiedenen Ziel-Patchpanels befinden, an die das Breakout-Kabel angeschlossen ist',
	'Class:BreakoutCable/Attribute:rack2_name' => 'Rack #2 name',
	'Class:BreakoutCable/Attribute:rack2_name+' => '',
	'Class:BreakoutCable/Attribute:patchpanels_list' => 'Patchpanels',
	'Class:BreakoutCable/Attribute:patchpanels_list+' => 'Liste der Patchpanels, wo das Breakout-Kabel angeschlossen ist',
));

//
// Class: NetworkSocket
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:NetworkSocket' => 'Netzwerkdose',
	'Class:NetworkSocket+' => '',
	'Class:NetworkSocket:baseinfo' => 'Allgemeine Informationen',
	'Class:NetworkSocket:frontendinfo' => 'Vorderseitige Informationen',
	'Class:NetworkSocket:backendinfo' => 'Rückseitige Informationen',
	'Class:NetworkSocket:moreinfo' => 'Mehr Informationen',
	'Class:NetworkSocket/Attribute:code' => 'Kennung',
	'Class:NetworkSocket/Attribute:code+' => 'Kennung, die benutzt wird um die Netzwerkdose innerhalb des Patchpanels oder des Standorts zu identifizieren',
	'Class:NetworkSocket/Attribute:external_ref' => 'Externe Referenz',
	'Class:NetworkSocket/Attribute:external_ref+' => 'Referenz, die für Dritte relevant sein kann',
	'Class:NetworkSocket/Attribute:status' => 'Status',
	'Class:NetworkSocket/Attribute:status+' => 'Aktiv: wenn sowohl das vorderseitige als auch das rückseitige Seite definiert sind,
	 Bereit: wenn nur das rückseitige Netzwerkdose definiert ist,
	 Inaktiv: alle anderen Fälle.',
	'Class:NetworkSocket/Attribute:status/Value:active' => 'Aktiv',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => 'Inaktiv',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:status/Value:ready' => 'Bereit',
	'Class:NetworkSocket/Attribute:status/Value:ready+' => '',
	'Class:NetworkSocket/Attribute:location_id' => 'Standort',
	'Class:NetworkSocket/Attribute:location_id+' => 'Standort des Racks, welches dem Patchpanel und die Netzwerkdosen zugeordnet ist, oder des Raumes der Netzwerkdose',
	'Class:NetworkSocket/Attribute:location_name' => 'Standort Name',
	'Class:NetworkSocket/Attribute:location_name+' => '',
	'Class:NetworkSocket/Attribute:rack_id' => 'Rack',
	'Class:NetworkSocket/Attribute:rack_id+' => 'Rack, welches zum Patchpanel gehört',
	'Class:NetworkSocket/Attribute:rack_name' => 'Rack Name',
	'Class:NetworkSocket/Attribute:rack_name+' => '',
	'Class:NetworkSocket/Attribute:patchpanel_id' => 'Patchpanel',
	'Class:NetworkSocket/Attribute:patchpanel_id+' => 'Patchpanel, welches zur Netzwerkdose gehört',
	'Class:NetworkSocket/Attribute:patchpanel_name' => 'Patchpanel Name',
	'Class:NetworkSocket/Attribute:patchpanel_name+' => '',
	'Class:NetworkSocket/Attribute:org_id+' => 'Organisation, zu der der Standort gehört. Es definiert auch die Organisation der Netzwerkdose.',
	'Class:NetworkSocket/Attribute:comment' => 'Kommentar',
	'Class:NetworkSocket/Attribute:comment+' => '',
	'Class:NetworkSocket/Attribute:connectableci_id' => 'Gerät',
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Gerät, welches mit der Netzwerkdose verbunden ist. Dieses Feld kann nicht gleichzeitig mit dem Feld der Netzwerkdose ausgefüllt sein.',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Name Gerät',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Physikalische Schnittstelle (Interface)',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Physikalische Schnittstelle (Interface) durch welches das Gerät mit der Netzwerkdose verbunden ist',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Name physikalische Schnittstelle',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Netzwerkdose',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Entfernte Netzwerkdose, welche mit der Netzwerkdose verbunden ist. Dieses Feld kann nicht gleichzeitig mit dem Geräte-Feld ausgefüllt sein.',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Netzwerkdose Name',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:crossconnect_id' => 'Cross Connect',
	'Class:NetworkSocket/Attribute:crossconnect_id+' => 'Das Cross Connect geht über die Netzwerkbuchse. Dieses Attribut kann nicht gleichzeitig mit den Geräte-Feld gefüllt werden',
	'Class:NetworkSocket/Attribute:crossconnect_name' => 'Cross Connect Name',
	'Class:NetworkSocket/Attribute:crossconnect_name+' => '',
	'Class:NetworkSocket/Attribute:backendsocket_id' => 'Rückseitige Netzwerkdose',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => 'Entfernte Netzwerkdose, welche durch rückseitiges Kabel verbunden ist',
	'Class:NetworkSocket/Tab:cables_list' => 'Kabel',
	'Class:NetworkSocket/Tab:cables_list+' => 'Liste aller Kabel, welche mit der Netzwerk-Doese verbunden sind',
));

//
// Class: PatchPanel
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PatchPanel' => 'Patchpanel',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => 'Allgemeine Informationen',
	'Class:PatchPanel:moreinfo' => 'Mehr Informationen',
	'Class:PatchPanel:rackinfo' => 'Rack Informationen',
	'Class:PatchPanel/Attribute:external_ref' => 'Externe Referenz',
	'Class:PatchPanel/Attribute:external_ref+' => 'Referenz, die für Dritte relevant sein kann',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack, in dem sich das Patchpanel befindet',
	'Class:PatchPanel/Attribute:rack_name' => 'Rack Name',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:enclosure_id' => 'Gehäuse',
	'Class:PatchPanel/Attribute:enclosure_id+' => 'Gehäuse, in dem sich das Patchpanel befindet',
	'Class:PatchPanel/Attribute:enclosure_name' => 'Gehäuse Name',
	'Class:PatchPanel/Attribute:enclosure_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Kapazität',
	'Class:PatchPanel/Attribute:capacity+' => 'Anzahl der Netzwerkdosen am Patchpanel',
	'Class:PatchPanel/Attribute:free_sockets' => 'Freie Netzwerdosen',
	'Class:PatchPanel/Attribute:free_sockets+' => 'Anzahl der noch verfügbaren Netzwerkdosen am Patchpanel: nicht verkabelt, inaktiv oder bereit',
	'Class:PatchPanel/Attribute:ready_sockets' => 'Bereite Netzwerkdosen',
	'Class:PatchPanel/Attribute:ready_sockets+' => 'Anzahl der Netzwerkdosen mit dem Status \'bereit\'',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Netzwerkdosen',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'Liste aller Netzwerkdosen des Patchpanels',
	'Class:PatchPanel/Tab:cables_list' => 'Kabel',
	'Class:PatchPanel/Tab:cables_list+' => 'Liste aller Kabel, welche mit einer Netzwerkdose von diesem Patchpanel verbunden sind',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Nachbar-Anschlüsse der Vorderseite des Panels',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'Liste aller Patchpanels verbunden mit dem aktuellen Panel durch die vorderseitige Netzwerkdose der angeschlossenen Dosen',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Nachbar-Anschlüsse der Rückseite des Panels',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'Liste aller Patchpanels verbunden mit dem aktuellen Panel durch die rückseitige Netzwerkdose der angeschlossenen Dosen',
));

//
// Class: lnkBreakoutCableToPatchPanel
//

Dict::Add('DE DE', 'English', 'English', array(
	'Class:lnkBreakoutCableToPatchPanel' => 'Verknüpfung Breakout-Kabel / Patchpanel',
	'Class:lnkBreakoutCableToPatchPanel+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id' => 'Breakout-Kabel',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label' => 'Breakout-Kabel Etikett',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id' => 'Patchpanel',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name' => 'Patchpanel Name',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks' => 'Fasern verwendet',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks+' => '',
));

//
// Class: CrossConnect
//

Dict::Add('DE DE', 'English', 'English', array(
	'Class:CrossConnect' => 'Cross Connect',
	'Class:CrossConnect+' => 'Verkabelung, die erforderlich ist, um eine direkte Verbindung zwischen zwei separaten Hardwareeinheiten herzustellen',
	'Class:CrossConnect:baseinfo' => 'Allgemeine Informationen',
	'Class:CrossConnect:localinfo' => 'Informationen zur lokalen Einheit',
	'Class:CrossConnect:remoteinfo' => 'Informationen zur Peer-Einheit',
	'Class:CrossConnect/Tab:wiring' => 'Verkabelungspfad',
	'Class:CrossConnect/Tab:wiring+' => 'Verkabelungspfad zwischen den lokalen und Peer-Patchpanels anzeigen',
	'Class:CrossConnect/Attribute:ref' => 'Referenz',
	'Class:CrossConnect/Attribute:ref+' => 'Cross Connect Referenz für die lokale Organisation',
	'Class:CrossConnect/Attribute:remote_org_id' => 'Peer-Organisation',
	'Class:CrossConnect/Attribute:remote_org_id+' => 'Peer-Organisation für den Cross-Connect',
	'Class:CrossConnect/Attribute:remote_ref' => 'Peer-Referenz',
	'Class:CrossConnect/Attribute:remote_ref+' => 'Cross Connect Referenz für die Peer-Organisation',
	'Class:CrossConnect/Attribute:status' => 'Status',
	'Class:CrossConnect/Attribute:status+' => 'Betriebsstatus des Cross Connects',
	'Class:CrossConnect/Attribute:status/Value:construction' => 'Konstruktion',
	'Class:CrossConnect/Attribute:status/Value:construction+' => '',
	'Class:CrossConnect/Attribute:status/Value:production' => 'Produktion',
	'Class:CrossConnect/Attribute:status/Value:production+' => '',
	'Class:CrossConnect/Attribute:status/Value:cancellation' => 'Stornierung',
	'Class:CrossConnect/Attribute:status/Value:cancellation+' => '',
	'Class:CrossConnect/Attribute:status/Value:obsolete' => 'Veraltet',
	'Class:CrossConnect/Attribute:status/Value:obsolete+' => '',
	'Class:CrossConnect/Attribute:cablecategory_id' => 'Kabelskategorie und -typ',
	'Class:CrossConnect/Attribute:cablecategory_id+' => 'Kategorie und Typ des Kabels, die die beiden Peers verbinden',
	'Class:CrossConnect/Attribute:cablecategory_name' => 'Kabelskategorie Name',
	'Class:CrossConnect/Attribute:cablecategory_name+' => '',
	'Class:CrossConnect/Attribute:location_id' => 'Standort',
	'Class:CrossConnect/Attribute:location_id+' => 'Standort des Racks, das das Patchpanel und die Netzwerkdose(n) des lokalen Endes des Cross Connects enthält',
	'Class:CrossConnect/Attribute:location_name' => 'Standort Name',
	'Class:CrossConnect/Attribute:location_name+' => '',
	'Class:CrossConnect/Attribute:rack_id' => 'Rack',
	'Class:CrossConnect/Attribute:rack_id+' => 'Rack mit dem Patchpanel',
	'Class:CrossConnect/Attribute:rack_name' => 'Rack Name',
	'Class:CrossConnect/Attribute:rack_name+' => '',
	'Class:CrossConnect/Attribute:patchpanel_id' => 'Patchpanel',
	'Class:CrossConnect/Attribute:patchpanel_id+' => 'Patchpanel, auf dem sich die Netzwerkdose befindet',
	'Class:CrossConnect/Attribute:patchpanel_name' => 'Patchpanel Name',
	'Class:CrossConnect/Attribute:patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:networksocket1_id' => 'Primäre Netzwerkdose',
	'Class:CrossConnect/Attribute:networksocket1_id+' => 'Primäre Netzwerkdose am lokalen Ende des Cross-Connects',
	'Class:CrossConnect/Attribute:networksocket1_name' => 'Primäre Netzwerkdose Name',
	'Class:CrossConnect/Attribute:networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:networksocket2_id' => 'Sekundäre Netzwerkdose',
	'Class:CrossConnect/Attribute:networksocket2_id+' => 'Zweite und optionale Netzwerkdose, die im Falle einer Doppelverbindung verwendet wird',
	'Class:CrossConnect/Attribute:networksocket2_name' => 'Sekundäre Netzwerkdose Name',
	'Class:CrossConnect/Attribute:networksocket2_name+' => '',
	'Class:CrossConnect/Attribute:remote_location_id' => 'Peer-Standort',
	'Class:CrossConnect/Attribute:remote_location_id+' => 'Standort des Racks, das das Patchpanel und die Netzwerkdosen des Peer-Endes des Cross Connects enthält',
	'Class:CrossConnect/Attribute:remote_location_name' => 'Peer-Standort Name',
	'Class:CrossConnect/Attribute:remote_location_name+' => '',
	'Class:CrossConnect/Attribute:remote_rack_id' => 'Peer-Rack',
	'Class:CrossConnect/Attribute:remote_rack_id+' => 'Peer-Rack, auf dem sich das Patchpanel befindet',
	'Class:CrossConnect/Attribute:remote_rack_name' => 'Peer-Rack Name',
	'Class:CrossConnect/Attribute:remote_rack_name+' => '',
	'Class:CrossConnect/Attribute:remote_patchpanel_id' => 'Peer Patchpanel',
	'Class:CrossConnect/Attribute:remote_patchpanel_id+' => 'Peer Patchpanel, auf dem sich die Netzwerkdose befindet',
	'Class:CrossConnect/Attribute:remote_patchpanel_name' => 'Peer Patchpanel Name',
	'Class:CrossConnect/Attribute:remote_patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket1_id' => 'Peer primäre Netzwerkdose',
	'Class:CrossConnect/Attribute:remote_networksocket1_id+' => 'Peering der primären Netzwerkdose mit dem primären',
	'Class:CrossConnect/Attribute:remote_networksocket1_name' => 'Peer primäre Netzwerkdose Name',
	'Class:CrossConnect/Attribute:remote_networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket2_id' => 'Peer sekundäre Netzwerkdose',
	'Class:CrossConnect/Attribute:remote_networksocket2_id+' => 'Peering der zweiten Netzwerkdose mit dem sekundären',
	'Class:CrossConnect/Attribute:remote_networksocket2_name' => 'Peer sekundäre Netzwerkdose Name',
	'Class:CrossConnect/Attribute:remote_networksocket2_name+' => '',
));

//
// Class: PhysicalInterface
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Netzwerkdose',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Entfernte Netzwerkdose, welche mit der Schnittstelle (Interface) verbunden ist',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id' => 'Remote-Gerät',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id+' => 'An die Schnittstelle (Interface) angeschlossenes Remote-Gerät. Dieses Attribut kann nicht gleichzeitig mit dem Netzwerkdose gefüllt werden.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name' => 'Name des Remote-Geräts',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name+' => '',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id' => 'Entfernte Physikalische Schnittstelle',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id+' => 'Physikalische Schnittstelle (Interface), welches an dem entfernten Gerät für die Verbindung verwendet wird',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name' => 'Name der entfernten physikalischen Schnittstelle',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name+' => '',
	'Class:PhysicalInterface/Tab:cables_list' => 'Kabel',
	'Class:PhysicalInterface/Tab:cables_list+' => 'Liste aller Kabel, welche mit der Schnittstelle (Interface) verbunden sind',
));

//
// Class: Rack
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:Rack/Attribute:patchpanels_list' => 'Patchpanels',
	'Class:Rack/Attribute:patchpanels_list+' => 'Liste aller Patchpanels, welche mit dem Patchpanel verbunden sind',
));

//
// Menus & actions
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Menu:TeemIpNetworking:Cabling' => 'Verkabelung',

	'Relation:wiring/Description' => 'Verkabelungs-Schema',
	'Relation:wiring/DownStream' => 'Verkabelung (DownStream)...',
	'Relation:wiring/DownStream+' => 'Verkabelungs-Schema (DownStream)',
	'Relation:wiring/UpStream' => 'Verkabelung (UpStream)...',
	'Relation:wiring/UpStream+' => 'Verkabelungs-Schema (UpStream)',

	'teemip-cable-mgmt/Operation:CreateBackEndNetworkCables/Title' => 'Netzwerkkabel erstellen',
	'teemip-cable-mgmt/Operation:ListAvailableWirings/Title' => 'Verkabelungswege',

	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'Ein Kabel ist bereits mit den gleichen Netzwerkbuchse verbunden',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel' => 'Ein Patchpanel muss ausgewählt werden, wenn die Netzwerkdose zu einem Rack gehört!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'Eine Netzwerkdose kann nicht mit beidem, einem Interface und einer anderen Netzwerkdose, verbunden sein!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndCrossConnect' => 'Ein Netzwerkdose kann nicht SOWOHL an eine Interface als auch an einen Cross-Connect angeschlossen werden!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToSocketAndCrossConnect' => 'Eine Netzwerkdose kann nicht SOWOHL mit einer anderen Netzwerkdose als auch mit einem Cross-Connect verbunden werden!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'Eine Netzwerkdose kann nicht mit der selben entfernten Netzwerkdose mit seiner vorderseitigen und seiner rückseitigen Konnektoren verbunden sein!',

	'UI:CableManagement:Action:CreateOrUpdate:PhysicalInterface:NoDualSocketAndCIAllowed' => 'Eine physikalische Schnittstelle (Interface) kann nicht gleichzeitig mit einer Netzwerkdose und einem entfernten Gerät verbunden werden!',

	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets' => 'Netzwerkdose erstellen',
	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoLocationDefined' => 'Es können keine Netzwerksteckdosen erstellt werden, da auf dem Patchpanel kein Standort konfiguriert ist !',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables' => 'Netzwerkkabel (Rückseite) erstellen',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Title' => 'Netzwerkkabel (Rückseite) für das Patchpanel xx: %1$s erstellen',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Helper' => 'Wählen Sie ein entferntes Patchpanel aus',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelAvailable' => 'Für diesen Vorgang steht eigentlich kein entferntes Patchpanel zur Verfügung !',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelExists' => 'Netzwerkkabel (Rückseite) können nicht erstellt werden: entferntes Patchpanel %1$s existiert nicht !',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity' => 'Netzwerkkabel (Rückseite) können nicht erstellt werden: Kapazität des entfernten Patchpanels %1$s ist erschöpft !',

	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotInBreakoutCableRacks' => 'Das Patchpanel gehört zu keinem der Racks, die das Breakout-Kabel verbindet!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotEnoughCapacity' => 'Im Patchpanel %1$s ist nicht mehr genügend Kapazität für die benötigten Links vorhanden!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:BreakoutCableNotEnoughCapacity' => 'Das Breakout-Kabel verfügt nicht über genügend Kapazität für die vom Patchpanel %1$s angeforderte Anzahl von Verbindungen!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:NotEnoughCapacityInBreakoutCableRacks' => 'Im Breakout-Kabel ist nicht mehr genügend Kapazität für die benötigten Links vorhanden!',

	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothMainSocketsFilled' => 'Das Cross Connect kann nicht ohne primäre und sekundäre Netzwerkdose auf Produktion gesetzt werden!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothSecondarySocketsFilled' => 'Wenn eine sekundäre Netzwerkdose festgelegt ist, muss die andere auch festgelegt werden!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings' => 'Verkabelungswege suchen',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Title' => '-> Liste der möglichen Verkabelungswege für den %1$s: %2$s',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Helper' => 'Einen Weg wählen und aktivieren',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxRackLevelIsTooShort' => 'Die erforderliche maximale Anzahl der zu überquerenden Racks (%1$s) darf nicht kleiner als 1 sein!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxOffersIsTooLow' => 'Die Anzahl der erwarteten Angebote darf nicht kleiner als 1 sein!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:NumberOfOffers' => '%1$s Pfade von %2$s angeforderten Pfaden ',
));
