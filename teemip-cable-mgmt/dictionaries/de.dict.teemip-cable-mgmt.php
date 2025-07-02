<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
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
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs' => 'Verkabelung organisationsübergreifend zulassen',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs+' => 'Ermöglicht es, ein Patchpanel über Backend-Kabel mit einem Patchpanel einer anderen Organisation zu verbinden.',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes' => 'Ja',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes+' => 'Organisationsübergreifende Verkabelung ist erlaubt.',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no' => 'Nein',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no+' => 'Organisationsübergreifende Verkabelung ist nicht erlaubt.',
));

//
// Class: CableType
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:CableType' => 'Kabeltyp',
	'Class:CableType+' => 'Definiert die Art eines Kabels (z. B. Kupfer oder Glasfaser).',
	'Class:CableType/Attribute:description' => 'Beschreibung',
	'Class:CableType/Attribute:description+' => 'Detailbeschreibung des Kabeltyps.',
	'Class:CableType/Attribute:cablecategories_list' => 'Kabelkategorien',
	'Class:CableType/Attribute:cablecategories_list+' => 'Liste der Kabelkategorien, die diesem Kabeltyp zugeordnet sind.',
));


//
// Class: CableCategory
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:CableCategory' => 'Kabelkategorie',
	'Class:CableCategory+' => 'Definiert eine Kategorie innerhalb eines Kabeltyps (z. B. Kategorie 5e, Kategorie 6).',
	'Class:CableCategory/Attribute:cabletype_id' => 'Kabeltyp',
	'Class:CableCategory/Attribute:cabletype_id+' => 'Der Kabeltyp, zu dem diese Kategorie gehört.',
	'Class:CableCategory/Attribute:description' => 'Beschreibung',
	'Class:CableCategory/Attribute:description+' => 'Detailbeschreibung der Kabelkategorie.',
));

//
// Class: NetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:NetworkCable' => 'Netzwerkkabel',
	'Class:NetworkCable+' => 'Ein physisches Kabel zur Verbindung von Netzwerkkomponenten.',
	'Class:NetworkCable:baseinfo' => 'Allgemeine Informationen',
	'Class:NetworkCable:capacity' => 'Kapazitäten',
	'Class:NetworkCable:endpoints' => 'Verbindungspunkte',
	'Class:NetworkCable:membership' => 'Zugehörigkeit',
	'Class:NetworkCable/Attribute:finalclass' => 'Klasse',
	'Class:NetworkCable/Attribute:finalclass+' => 'Die konkrete Klasse dieses Kabelobjekts.',
	'Class:NetworkCable/Attribute:cabletype_id' => 'Kabeltyp',
	'Class:NetworkCable/Attribute:cabletype_id+' => 'Der Typ des Kabels.',
	'Class:NetworkCable/Attribute:cabletype_name' => 'Kabeltyp Name',
	'Class:NetworkCable/Attribute:cabletype_name+' => '',
	'Class:NetworkCable/Attribute:cablecategory_id' => 'Kabelkategorie',
	'Class:NetworkCable/Attribute:cablecategory_id+' => 'Die Kategorie dieses Kabels.',
	'Class:NetworkCable/Attribute:cablecategory_name' => 'Kabelkategorie Name',
	'Class:NetworkCable/Attribute:cablecategory_name+' => '',
	'Class:NetworkCable/Attribute:length' => 'Länge (m)',
	'Class:NetworkCable/Attribute:length+' => 'Länge des Kabels in Metern.',
	'Class:NetworkCable/Attribute:label' => 'Etikett',
	'Class:NetworkCable/Attribute:label+' => 'Beschriftung des Kabels.',
	'Class:NetworkCable/Attribute:comment' => 'Kommentar',
	'Class:NetworkCable/Attribute:comment+' => 'Freitextkommentar zum Kabel.',
	'Class:NetworkCable/Attribute:documents_list' => 'Dokumente',
	'Class:NetworkCable/Attribute:documents_list+' => 'Liste aller mit diesem Kabel verknüpften Dokumente.',
));

//
// Class: FrontEndNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:FrontEndNetworkCable' => 'Netzwerkkabel (Vorderseite)',
	'Class:FrontEndNetworkCable+' => 'Kabel, das zwei Netzwerkdosen an der Vorderseite verbindet.',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id' => 'Netzwerkdose #1 (Vorderseite)',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id+' => 'Erste Netzwerkdose (Vorderseite), mit der das Kabel verbunden ist.',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name' => 'Netzwerkdose #1 Name',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name+' => '',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id' => 'Netzwerkdose #2 (Vorderseite)',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id+' => 'Zweite Netzwerkdose (Vorderseite), mit der das Kabel verbunden ist.',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name' => 'Netzwerkdose #2 Name',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name+' => '',
));

//
// Class: BackEndNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:BackEndNetworkCable' => 'Netzwerkkabel (Rückseite)',
	'Class:BackEndNetworkCable+' => 'Kabel, das zwei Netzwerkdosen an der Rückseite verbindet.',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id' => 'Netzwerkdose #1 (Rückseite)',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id+' => 'Erste Netzwerkdose (Rückseite), mit der das Kabel verbunden ist.',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name' => 'Netzwerkdose #1 Name',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name+' => '',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id' => 'Netzwerkdose #2 (Rückseite)',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id+' => 'Zweite Netzwerkdose (Rückseite), mit der das Kabel verbunden ist.',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name' => 'Netzwerkdose #2 Name',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name+' => '',
	'Class:BackEndNetworkCable/Attribute:breakoutcable_id' => 'Breakout-Kabel',
	'Class:BackEndNetworkCable/Attribute:breakoutcable_id+' => 'Breakout-Kabel, zu dem dieses Backend-Kabel gehört.',
	'Class:BackEndNetworkCable/Attribute:breakoutcable_name' => 'Breakout-Kabel Name',
	'Class:BackEndNetworkCable/Attribute:breakoutcable_name+' => '',
));

//
// Class: DeviceNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:DeviceNetworkCable' => 'Geräte-Netzwerkkabel',
	'Class:DeviceNetworkCable+' => 'Kabel, das eine Netzwerkdose (Vorderseite) mit einem Netzwerkanschluss eines Geräts verbindet.',
	'Class:DeviceNetworkCable/Attribute:networksocket_id' => 'Netzwerkdose (Vorderseite)',
	'Class:DeviceNetworkCable/Attribute:networksocket_id+' => 'Netzwerkdose (Vorderseite), mit der das Kabel verbunden ist.',
	'Class:DeviceNetworkCable/Attribute:networksocket_name' => 'Netzwerkdose Name',
	'Class:DeviceNetworkCable/Attribute:networksocket_name+' => '',
	'Class:DeviceNetworkCable/Attribute:connectableci_id' => 'Gerät',
	'Class:DeviceNetworkCable/Attribute:connectableci_id+' => 'Gerät, dessen Netzwerkanschluss mit dem Kabel verbunden ist.',
	'Class:DeviceNetworkCable/Attribute:connectableci_name' => 'Gerät Name',
	'Class:DeviceNetworkCable/Attribute:connectableci_name+' => '',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id' => 'Netzwerkanschluss',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id+' => 'Netzwerkanschluss des Geräts, der mit dem Kabel verbunden ist.',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name' => 'Netzwerkanschluss Name',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name+' => '',
));

//
// Class: DirectNetworkCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:DirectNetworkCable' => 'Direktes Netzwerkkabel',
	'Class:DirectNetworkCable+' => 'Kabel, das zwei Netzwerkanschlüsse direkt miteinander verbindet.',
	'Class:DirectNetworkCable/Attribute:connectableci1_id' => 'Gerät #1',
	'Class:DirectNetworkCable/Attribute:connectableci1_id+' => 'Gerät, zu dessen Netzwerkanschluss #1 das Kabel verbunden ist.',
	'Class:DirectNetworkCable/Attribute:connectableci1_name' => 'Gerät #1 Name',
	'Class:DirectNetworkCable/Attribute:connectableci1_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id' => 'Netzwerkanschluss #1',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id+' => 'Netzwerkanschluss #1, der mit dem Kabel verbunden ist.',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name' => 'Netzwerkanschluss #1 Name',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name+' => '',
	'Class:DirectNetworkCable/Attribute:connectableci2_id' => 'Gerät #2',
	'Class:DirectNetworkCable/Attribute:connectableci2_id+' => 'Gerät, zu dessen Netzwerkanschluss #2 das Kabel verbunden ist.',
	'Class:DirectNetworkCable/Attribute:connectableci2_name' => 'Gerät #2 Name',
	'Class:DirectNetworkCable/Attribute:connectableci2_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id' => 'Netzwerkanschluss #2',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id+' => 'Netzwerkanschluss #2, der mit dem Kabel verbunden ist.',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name' => 'Netzwerkanschluss #2 Name',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name+' => '',
));

//
// Class: BreakoutCable
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:BreakoutCable' => 'Breakout-Kabel',
	'Class:BreakoutCable+' => 'Kabel, das mehrere Leitungen zusammenführt und damit mehrere Buchsen verschiedener Patchpanels verbindet.',
	'Class:BreakoutCable/Attribute:capacity' => 'Kapazität',
	'Class:BreakoutCable/Attribute:capacity+' => 'Gesamtanzahl der Leitungen, die das Breakout-Kabel enthält.',
	'Class:BreakoutCable/Attribute:freelinks' => 'Freie Leitungen',
	'Class:BreakoutCable/Attribute:freelinks+' => 'Anzahl derzeit verfügbarer Leitungen innerhalb des Breakout-Kabels.',
	'Class:BreakoutCable/Attribute:rack1_id' => 'Rack #1',
	'Class:BreakoutCable/Attribute:rack1_id+' => 'Rack, in dem sich die Quell-Patchpanels befinden, die mit dem Breakout-Kabel verbunden sind.',
	'Class:BreakoutCable/Attribute:rack1_name' => 'Rack #1 Name',
	'Class:BreakoutCable/Attribute:rack1_name+' => '',
	'Class:BreakoutCable/Attribute:rack2_id' => 'Rack #2',
	'Class:BreakoutCable/Attribute:rack2_id+' => 'Rack, in dem sich die Ziel-Patchpanels befinden, die mit dem Breakout-Kabel verbunden sind.',
	'Class:BreakoutCable/Attribute:rack2_name' => 'Rack #2 Name',
	'Class:BreakoutCable/Attribute:rack2_name+' => '',
	'Class:BreakoutCable/Attribute:patchpanels_list' => 'Patchpanels',
	'Class:BreakoutCable/Attribute:patchpanels_list+' => 'Liste der Patchpanels, an die das Breakout-Kabel angeschlossen ist.',
	'Class:BreakoutCable/Attribute:backendnetworkcable_list' => 'Back-End-Netzwerkkabel',
	'Class:BreakoutCable/Attribute:backendnetworkcable_list+' => 'Liste der Back-End-Netzwerkkabel, die Teil dieses Breakout-Kabels sind.',
));

//
// Class: NetworkSocket
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:NetworkSocket' => 'Netzwerkdose',
	'Class:NetworkSocket+' => 'Definiert eine Anschlussbuchse für Netzwerkverbindungen.',
	'Class:NetworkSocket:baseinfo' => 'Allgemeine Informationen',
	'Class:NetworkSocket:frontendinfo' => 'Informationen Vorderseite',
	'Class:NetworkSocket:backendinfo' => 'Informationen Rückseite',
	'Class:NetworkSocket:moreinfo' => 'Weitere Informationen',
	'Class:NetworkSocket/Attribute:code' => 'Kennung',
	'Class:NetworkSocket/Attribute:code+' => 'Kennung, die die Netzwerkdose innerhalb eines Patchpanels oder Standorts eindeutig identifiziert.',
	'Class:NetworkSocket/Attribute:external_ref' => 'Externe Referenz',
	'Class:NetworkSocket/Attribute:external_ref+' => 'Referenz, die für Dritte oder externe Systeme relevant sein kann.',
	'Class:NetworkSocket/Attribute:status' => 'Status',
	'Class:NetworkSocket/Attribute:status+' => 'Aktiv: wenn Vorder- und Rückseite definiert sind; Bereit: wenn nur die Rückseite definiert ist; Inaktiv: in allen anderen Fällen.',
	'Class:NetworkSocket/Attribute:status/Value:active' => 'Aktiv',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => 'Inaktiv',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:status/Value:ready' => 'Bereit',
	'Class:NetworkSocket/Attribute:status/Value:ready+' => '',
	'Class:NetworkSocket/Attribute:location_id' => 'Standort',
	'Class:NetworkSocket/Attribute:location_id+' => 'Standort, an dem sich das Rack oder der Raum der Netzwerkdose befindet.',
	'Class:NetworkSocket/Attribute:location_name' => 'Standort Name',
	'Class:NetworkSocket/Attribute:location_name+' => '',
	'Class:NetworkSocket/Attribute:rack_id' => 'Rack',
	'Class:NetworkSocket/Attribute:rack_id+' => 'Rack, dem diese Netzwerkdose zugeordnet ist.',
	'Class:NetworkSocket/Attribute:rack_name' => 'Rack Name',
	'Class:NetworkSocket/Attribute:rack_name+' => '',
	'Class:NetworkSocket/Attribute:patchpanel_id' => 'Patchpanel',
	'Class:NetworkSocket/Attribute:patchpanel_id+' => 'Patchpanel, zu dem diese Netzwerkdose gehört.',
	'Class:NetworkSocket/Attribute:patchpanel_name' => 'Patchpanel Name',
	'Class:NetworkSocket/Attribute:patchpanel_name+' => '',
	'Class:NetworkSocket/Attribute:org_id' => 'Organisation',
	'Class:NetworkSocket/Attribute:org_id+' => 'Organisation der Netzwerkdose. Standardmäßig übernimmt sie die Organisation des Patchpanels, falls vorhanden, sonst die des Standorts.',
	'Class:NetworkSocket/Attribute:comment' => 'Kommentar',
	'Class:NetworkSocket/Attribute:comment+' => 'Freitextfeld für ergänzende Hinweise.',
	'Class:NetworkSocket/Attribute:connectableci_id' => 'Gerät',
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Das mit der Netzwerkdose verbundene Gerät. Dieses Feld darf nicht gleichzeitig mit einem verbundenen Netzwerkdosenfeld gefüllt sein.',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Gerät Name',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Netzwerkanschluss',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Netzwerkanschluss des Geräts, der mit der Netzwerkdose verbunden ist.',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Netzwerkanschluss Name',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Netzwerkdose',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Netzwerkdose, die mit dieser verbunden ist. Dieses Feld darf nicht gleichzeitig mit dem Geräte-Feld genutzt werden.',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Netzwerkdose Name',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:crossconnect_id' => 'Cross Connect',
	'Class:NetworkSocket/Attribute:crossconnect_id+' => 'Cross Connect, über den diese Netzwerkdose verbunden ist.',
	'Class:NetworkSocket/Attribute:crossconnect_name' => 'Cross Connect Name',
	'Class:NetworkSocket/Attribute:crossconnect_name+' => '',
	'Class:NetworkSocket/Attribute:backendsocket_id' => 'Rückseitige Netzwerkdose',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => 'Netzwerkdose auf der Rückseite, mit der diese Dose verbunden ist.',
	'Class:NetworkSocket/Tab:cables_list' => 'Kabel',
	'Class:NetworkSocket/Tab:cables_list+' => 'Liste aller Kabel, die mit dieser Netzwerkdose verbunden sind.',
	'Class:NetworkSocket/Attribute:cabletype_id' => 'Kabeltyp',
	'Class:NetworkSocket/Attribute:cabletype_id+' => 'Kabeltyp, der mit dieser Netzwerkdose verwendet werden soll.',
	'Class:NetworkSocket/Attribute:cabletype_name' => 'Kabeltyp Name',
	'Class:NetworkSocket/Attribute:cabletype_name+' => '',
	'Class:NetworkSocket/Attribute:cablecategory_id' => 'Kabelkategorie',
	'Class:NetworkSocket/Attribute:cablecategory_id+' => 'Kabelkategorie, die mit dieser Netzwerkdose verwendet werden soll.',
	'Class:NetworkSocket/Attribute:cablecategory_name' => 'Kabelkategorie Name',
	'Class:NetworkSocket/Attribute:cablecategory_name+' => '',
));

//
// Class: PatchPanel
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PatchPanel' => 'Patchpanel',
	'Class:PatchPanel+' => 'Verteilerfeld für Netzwerkkabel.',
	'Class:PatchPanel:baseinfo' => 'Allgemeine Informationen',
	'Class:PatchPanel:connectivity' => 'Verbindungen',
	'Class:PatchPanel:rackinfo' => 'Rack-Informationen',
	'Class:PatchPanel/Attribute:external_ref' => 'Externe Referenz',
	'Class:PatchPanel/Attribute:external_ref+' => 'Referenz für externe Dokumentation oder Systeme.',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack, in dem sich das Patchpanel befindet.',
	'Class:PatchPanel/Attribute:rack_name' => 'Rack Name',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:enclosure_id' => 'Gehäuse',
	'Class:PatchPanel/Attribute:enclosure_id+' => 'Gehäuse, in dem sich das Patchpanel befindet.',
	'Class:PatchPanel/Attribute:enclosure_name' => 'Gehäuse Name',
	'Class:PatchPanel/Attribute:enclosure_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Kapazität',
	'Class:PatchPanel/Attribute:capacity+' => 'Anzahl der Netzwerkdosen im Patchpanel.',
	'Class:PatchPanel/Attribute:free_sockets' => 'Freie Netzwerkdosen',
	'Class:PatchPanel/Attribute:free_sockets+' => 'Anzahl derzeit verfügbarer Netzwerkdosen (nicht belegt oder inaktiv).',
	'Class:PatchPanel/Attribute:ready_sockets' => 'Bereitgestellte Netzwerkdosen',
	'Class:PatchPanel/Attribute:ready_sockets+' => 'Anzahl der Netzwerkdosen mit Status "bereit".',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Netzwerkdosen',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'Liste aller Netzwerkdosen, die diesem Patchpanel zugeordnet sind.',
	'Class:PatchPanel/Tab:cables_list' => 'Kabel',
	'Class:PatchPanel/Tab:cables_list+' => 'Alle Kabel, die mit einer Netzwerkdose des Patchpanels verbunden sind.',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Nachbarpanels (Vorderseite)',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'Patchpanels, die über vorderseitige Netzwerkdosen verbunden sind.',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Nachbarpanels (Rückseite)',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'Patchpanels, die über rückseitige Netzwerkdosen verbunden sind.',
	'Class:PatchPanel/Attribute:cabletype_id' => 'Kabeltyp',
	'Class:PatchPanel/Attribute:cabletype_id+' => 'Hauptkabeltyp, der mit dem Patchpanel verwendet werden soll.',
	'Class:PatchPanel/Attribute:cabletype_name' => 'Kabeltyp Name',
	'Class:PatchPanel/Attribute:cabletype_name+' => '',
	'Class:PatchPanel/Attribute:cablecategory_id' => 'Kabelkategorie',
	'Class:PatchPanel/Attribute:cablecategory_id+' => 'Hauptkabelkategorie, die mit dem Patchpanel verwendet werden soll.',
	'Class:PatchPanel/Attribute:cablecategory_name' => 'Kabelkategorie Name',
	'Class:PatchPanel/Attribute:cablecategory_name+' => '',
));

//
// Class: lnkBreakoutCableToPatchPanel
//

Dict::Add('DE DE', 'English', 'English', array(
	'Class:lnkBreakoutCableToPatchPanel' => 'Verknüpfung Breakout-Kabel / Patchpanel',
	'Class:lnkBreakoutCableToPatchPanel+' => 'Beziehung zwischen einem Breakout-Kabel und einem Patchpanel.',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id' => 'Breakout-Kabel',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id+' => 'Breakout-Kabel, das verbunden wird.',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label' => 'Breakout-Kabel Etikett',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label+' => 'Beschriftung des Breakout-Kabels.',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id' => 'Patchpanel',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id+' => 'Patchpanel, an das das Breakout-Kabel angeschlossen wird.',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name' => 'Patchpanel Name',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks' => 'Verwendete Leitungen',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks+' => 'Anzahl der genutzten Leitungen innerhalb dieser Verbindung.',
));

//
// Class: CrossConnect
//

Dict::Add('DE DE', 'English', 'English', array(
	'Class:CrossConnect' => 'Cross Connect',
	'Class:CrossConnect+' => 'Verkabelung, die eine direkte Verbindung zwischen zwei unabhängigen Hardware-Einheiten ermöglicht.',
	'Class:CrossConnect:baseinfo' => 'Allgemeine Informationen',
	'Class:CrossConnect:localinfo' => 'Lokale Anschlussinformationen',
	'Class:CrossConnect:remoteinfo' => 'Informationen Peer-Seite',
	'Class:CrossConnect/Tab:wiring' => 'Verkabelungspfad',
	'Class:CrossConnect/Tab:wiring+' => 'Zeigt den Verkabelungspfad zwischen lokalem und Peer-Patchpanel an.',
	'Class:CrossConnect/Tab:cables_list' => 'Kabel',
	'Class:CrossConnect/Tab:cables_list+' => 'Alle Kabel, die Bestandteil des Cross Connects sind.',
	'Class:CrossConnect/Attribute:ref' => 'Referenz',
	'Class:CrossConnect/Attribute:ref+' => 'Referenzkennzeichen für die lokale Organisation.',
	'Class:CrossConnect/Attribute:remote_org_id' => 'Peer-Organisation',
	'Class:CrossConnect/Attribute:remote_org_id+' => 'Organisation der Peer-Seite des Cross Connects.',
	'Class:CrossConnect/Attribute:remote_ref' => 'Peer-Referenz',
	'Class:CrossConnect/Attribute:remote_ref+' => 'Referenzkennzeichen für die Peer-Organisation.',
	'Class:CrossConnect/Attribute:status' => 'Status',
	'Class:CrossConnect/Attribute:status+' => 'Betriebsstatus des Cross Connects.',
	'Class:CrossConnect/Attribute:status/Value:construction' => 'In Bau',
	'Class:CrossConnect/Attribute:status/Value:construction+' => '',
	'Class:CrossConnect/Attribute:status/Value:production' => 'In Betrieb',
	'Class:CrossConnect/Attribute:status/Value:production+' => '',
	'Class:CrossConnect/Attribute:status/Value:cancellation' => 'Storniert',
	'Class:CrossConnect/Attribute:status/Value:cancellation+' => '',
	'Class:CrossConnect/Attribute:status/Value:obsolete' => 'Veraltet',
	'Class:CrossConnect/Attribute:status/Value:obsolete+' => '',
	'Class:CrossConnect/Attribute:cablecategory_id' => 'Kabelkategorie',
	'Class:CrossConnect/Attribute:cablecategory_id+' => 'Kategorie des Kabels, das beide Peers verbindet.',
	'Class:CrossConnect/Attribute:cablecategory_name' => 'Kabelkategorie Name',
	'Class:CrossConnect/Attribute:cablecategory_name+' => '',
	'Class:CrossConnect/Attribute:location_id' => 'Standort',
	'Class:CrossConnect/Attribute:location_id+' => 'Standort des Racks mit Patchpanel und Netzwerkdose(n) für das lokale Ende des Cross Connects.',
	'Class:CrossConnect/Attribute:location_name' => 'Standort Name',
	'Class:CrossConnect/Attribute:location_name+' => '',
	'Class:CrossConnect/Attribute:rack_id' => 'Rack',
	'Class:CrossConnect/Attribute:rack_id+' => 'Rack mit Patchpanel am lokalen Ende.',
	'Class:CrossConnect/Attribute:rack_name' => 'Rack Name',
	'Class:CrossConnect/Attribute:rack_name+' => '',
	'Class:CrossConnect/Attribute:patchpanel_id' => 'Patchpanel',
	'Class:CrossConnect/Attribute:patchpanel_id+' => 'Patchpanel am lokalen Ende.',
	'Class:CrossConnect/Attribute:patchpanel_name' => 'Patchpanel Name',
	'Class:CrossConnect/Attribute:patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:networksocket1_id' => 'Primäre Netzwerkdose',
	'Class:CrossConnect/Attribute:networksocket1_id+' => 'Primäre Netzwerkdose am lokalen Ende des Cross Connects.',
	'Class:CrossConnect/Attribute:networksocket1_name' => 'Primäre Netzwerkdose Name',
	'Class:CrossConnect/Attribute:networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:networksocket2_id' => 'Sekundäre Netzwerkdose',
	'Class:CrossConnect/Attribute:networksocket2_id+' => 'Optionale zweite Netzwerkdose am lokalen Ende, die im Falle einer Doppelverbindung verwendet wird.',
	'Class:CrossConnect/Attribute:networksocket2_name' => 'Sekundäre Netzwerkdose Name',
	'Class:CrossConnect/Attribute:networksocket2_name+' => '',
	'Class:CrossConnect/Attribute:connectableci_id' => 'Gerät',
	'Class:CrossConnect/Attribute:connectableci_id+' => 'Gerät, das lokal an den Cross Connect angeschlossen ist.',
	'Class:CrossConnect/Attribute:connectableci_name' => 'Gerät Name',
	'Class:CrossConnect/Attribute:connectableci_name+' => '',
	'Class:CrossConnect/Attribute:physicalinterface_id' => 'Netzwerkanschluss',
	'Class:CrossConnect/Attribute:physicalinterface_id+' => 'Netzwerkanschluss des Geräts, der lokal mit dem Cross Connect verbunden ist.',
	'Class:CrossConnect/Attribute:physicalinterface_name' => 'Netzwerkanschluss Name',
	'Class:CrossConnect/Attribute:physicalinterface_name+' => '',
	'Class:CrossConnect/Attribute:remote_location_id' => 'Peer-Standort',
	'Class:CrossConnect/Attribute:remote_location_id+' => 'Standort der Peer-Racks und Patchpanels.',
	'Class:CrossConnect/Attribute:remote_location_name' => 'Peer-Standort Name',
	'Class:CrossConnect/Attribute:remote_location_name+' => '',
	'Class:CrossConnect/Attribute:remote_rack_id' => 'Peer-Rack',
	'Class:CrossConnect/Attribute:remote_rack_id+' => 'Rack am Peer-Ende.',
	'Class:CrossConnect/Attribute:remote_rack_name' => 'Peer-Rack Name',
	'Class:CrossConnect/Attribute:remote_rack_name+' => '',
	'Class:CrossConnect/Attribute:remote_patchpanel_id' => 'Peer-Patchpanel',
	'Class:CrossConnect/Attribute:remote_patchpanel_id+' => 'Patchpanel am Peer-Ende.',
	'Class:CrossConnect/Attribute:remote_patchpanel_name' => 'Peer Patchpanel Name',
	'Class:CrossConnect/Attribute:remote_patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket1_id' => 'Peer primäre Netzwerkdose',
	'Class:CrossConnect/Attribute:remote_networksocket1_id+' => 'Primäre Netzwerkdose am Peer-Ende.',
	'Class:CrossConnect/Attribute:remote_networksocket1_name' => 'Peer primäre Netzwerkdose Name',
	'Class:CrossConnect/Attribute:remote_networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket2_id' => 'Peer sekundäre Netzwerkdose',
	'Class:CrossConnect/Attribute:remote_networksocket2_id+' => 'Optionale zweite Netzwerkdose am Peer-Ende.',
	'Class:CrossConnect/Attribute:remote_networksocket2_name' => 'Peer sekundäre Netzwerkdose Name',
	'Class:CrossConnect/Attribute:remote_networksocket2_name+' => '',
	'Class:CrossConnect/Attribute:remote_connectableci_id' => 'Peer-Gerät',
	'Class:CrossConnect/Attribute:remote_connectableci_id+' => 'Gerät am Peer-Ende des Cross Connects.',
	'Class:CrossConnect/Attribute:remote_connectableci_name' => 'Peer-Gerät Name',
	'Class:CrossConnect/Attribute:remote_connectableci_name+' => '',
	'Class:CrossConnect/Attribute:remote_physicalinterface_id' => 'Peer-Netzwerkanschluss',
	'Class:CrossConnect/Attribute:remote_physicalinterface_id+' => 'Netzwerkanschluss des Peer-Geräts, der den Cross Connect nutzt.',
	'Class:CrossConnect/Attribute:remote_physicalinterface_name' => 'Peer-Netzwerkanschluss Name',
	'Class:CrossConnect/Attribute:remote_physicalinterface_name+' => '',
));

//
// Class: PhysicalInterface
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Netzwerkdose',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Netzwerkdose, die mit diesem Netzwerkanschluss verbunden ist.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id' => 'Peer-Gerät',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id+' => 'Peer-Gerät, das mit diesem Netzwerkanschluss verbunden ist. Dieses Attribut kann nicht gleichzeitig mit dem Netzwerkdosen-Feld belegt sein.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name' => 'Peer-Gerät Name',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name+' => '',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id' => 'Peer-Netzwerkanschluss',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id+' => 'Netzwerkanschluss am Peer-Gerät, der für die Verbindung genutzt wird.',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name' => 'Peer-Netzwerkanschluss Name',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name+' => '',
	'Class:PhysicalInterface/Tab:cables_list' => 'Kabel',
	'Class:PhysicalInterface/Tab:cables_list+' => 'Liste aller Kabel, die mit diesem Netzwerkanschluss verbunden sind.',
));

//
// Class: Rack
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Class:Rack/Attribute:patchpanels_list' => 'Patchpanels',
	'Class:Rack/Attribute:patchpanels_list+' => 'Liste aller Patchpanels, die im Rack montiert sind.',
));

//
// Menus & actions
//

Dict::Add('DE DE', 'German', 'Deutsch', array(
	'Menu:TeemIpNetworking:Cabling' => 'Verkabelung',

	'Relation:wiring/Description' => 'Verkabelungsschema',
	'Relation:wiring/DownStream' => 'Verkabelung (Abgang)',
	'Relation:wiring/DownStream+' => 'Darstellung des Verkabelungsschemas in Abgangsrichtung',
	'Relation:wiring/UpStream' => 'Verkabelung (Zuleitung)',
	'Relation:wiring/UpStream+' => 'Darstellung des Verkabelungsschemas in Zuleitungsrichtung',

	'teemip-cable-mgmt/Operation:CreateBackEndNetworkCables/Title' => 'Back-End-Netzwerkkabel erstellen',
	'teemip-cable-mgmt/Operation:ListAvailableWirings/Title' => 'Verkabelungswege',

	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'Ein Kabel ist bereits mit denselben Netzwerkdosen verbunden!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel' => 'Ein Patchpanel muss ausgewählt werden, wenn die Netzwerkdose einem Rack zugeordnet ist!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'Eine Netzwerkdose kann nicht gleichzeitig mit einem Interface und einer anderen Netzwerkdose verbunden sein!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndCrossConnect' => 'Eine Netzwerkdose kann nicht gleichzeitig mit einem Interface und einem Cross Connect verbunden sein!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToSocketAndCrossConnect' => 'Eine Netzwerkdose kann nicht gleichzeitig mit einer anderen Netzwerkdose und einem Cross Connect verbunden sein!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'Eine Netzwerkdose kann nicht mit derselben gegenüberliegenden Netzwerkdose sowohl über den vorderseitigen als auch über den rückseitigen Anschluss verbunden sein!',
	'UI:CableManagement:Action:CreateOrUpdate:DeviceNetworkCable:Duplicate' => 'Ein Kabel, das dasselbe Gerät oder dieselbe Netzwerkdose verbindet, existiert bereits!',
	'UI:CableManagement:Action:CreateOrUpdate:DirectNetworkCable:Duplicate' => 'Ein Kabel, das dieselben Netzwerkanschlüsse verbindet, existiert bereits!',
	'UI:CableManagement:Action:CreateOrUpdate:BackEndNetworkCable:WrongBreakoutCable1' => 'Das Breakout-Kabel ist mit keinem der Patchpanels verbunden, die vom Back-End-Kabel %1$s verwendet werden!',
	'UI:CableManagement:Action:CreateOrUpdate:BackEndNetworkCable:WrongBreakoutCable2' => 'Das Breakout-Kabel ist nicht mit allen Patchpanels verbunden, die vom Back-End-Kabel %1$s verwendet werden!',

	'UI:CableManagement:Action:CreateOrUpdate:PhysicalInterface:NoDualSocketAndCIAllowed' => 'Ein Netzwerkanschluss kann nicht gleichzeitig mit einer Netzwerkdose und einem Remote-Gerät verbunden sein!',

	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets' => 'Netzwerkdosen erstellen',
	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoLocationDefined' => 'Es können keine Netzwerkdosen erstellt werden, da für das Patchpanel kein Standort definiert wurde!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoCapacity' => 'Es können keine Netzwerkdosen erstellt werden, da keine Kapazität mehr vorhanden ist!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables' => 'Back-End-Netzwerkkabel erstellen',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Title' => 'Back-End-Netzwerkkabel für Patchpanel %1$s erstellen',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Helper' => 'Bitte wählen Sie ein Peer-Patchpanel und die Anzahl der zu erstellenden Kabel.',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Quantity' => 'Anzahl',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelAvailable' => 'Für diesen Vorgang steht derzeit kein Peer-Patchpanel zur Verfügung!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelExists' => 'Back-End-Kabel können nicht erstellt werden, da das Peer-Patchpanel %1$s nicht existiert!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCreationRequested' => 'Es wurde keine Erstellung von Back-End-Kabeln angefordert!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity' => 'Back-End-Kabel können nicht erstellt werden: Kapazität des Peer-Patchpanels %1$s erschöpft!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NotEnoughCapacity' => 'Back-End-Kabel können nicht erstellt werden: Kapazität (%2$s) des Peer-Patchpanels %1$s reicht nicht aus (erforderlich: %3$s)!',

	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotInBreakoutCableRacks' => 'Das Patchpanel %1$s befindet sich in keinem der Racks, die das Breakout-Kabel verbindet!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotEnoughCapacity' => 'Im Patchpanel %1$s steht nicht genügend Kapazität für die benötigten Leitungen zur Verfügung!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:BreakoutCableNotEnoughCapacity' => 'Im Breakout-Kabel steht nicht genügend Kapazität für die benötigten Leitungen zur Verfügung!',

	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothMainSocketsFilled' => 'Der Cross Connect kann nicht auf "in Betrieb" gesetzt werden, wenn nicht beide primären Netzwerkdosen definiert sind!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothSecondarySocketsFilled' => 'Wenn eine sekundäre Netzwerkdose angegeben ist, muss auch die zweite angegeben sein!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings' => 'Verkabelungswege suchen',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Title' => '-> Mögliche Verkabelungswege für %1$s: %2$s',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Helper' => 'Bitte einen Vorschlag auswählen und aktivieren.',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxRackLevelIsTooShort' => 'Die maximale Anzahl der zu durchquerenden Racks (%1$s) darf nicht kleiner als 1 sein!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxOffersIsTooLow' => 'Die erwartete Anzahl an Vorschlägen darf nicht kleiner als 1 sein!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:NoPathFound' => 'Es wurde kein Weg gefunden, um die beiden Patchpanels zu verbinden!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:NumberOfOffers' => '%1$s von %2$s angeforderten Pfaden gefunden',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateCables' => 'Kabel erstellen',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateDeviceNetworkCable:MissingEnd' => 'Das Gerätenetzwerkkabel kann nicht erstellt werden, da mindestens ein Ende nicht angegeben ist!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateFrontEndNetworkCable:MissingEnd' => 'Das Front-End-Netzwerkkabel kann nicht erstellt werden, da mindestens ein Ende nicht angegeben ist!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateNetworkCable:ConsolidateErrors' => 'Die folgenden Fehler sind aufgetreten:',
));
