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

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:CableType' => 'Type de Câble',
	'Class:CableType+' => '',
	'Class:CableType/Attribute:description' => 'Description',
	'Class:CableType/Attribute:description+' => '',
	'Class:CableType/Attribute:cablecategories_list' => 'Catégories de câbles',
	'Class:CableType/Attribute:cablecategories_list+' => '',
));

//
// Class: CableCategory
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:CableCategory' => 'Catégorie de Câble',
	'Class:CableCategory+' => '',
	'Class:CableCategory/Attribute:cabletype_id' => 'Type de câble',
	'Class:CableCategory/Attribute:cabletype_id+' => '',
	'Class:CableCategory/Attribute:description' => 'Description',
	'Class:CableCategory/Attribute:description+' => '',
));

//
// Class: NetworkCable
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:NetworkCable' => 'Câble Réseau',
	'Class:NetworkCable+' => '',
	'Class:NetworkCable/Name' => '%1$s <-> %2$s',
	'Class:NetworkCable:baseinfo' => 'Informations Générales',
	'Class:NetworkCable:endpoints' => 'Points de Connexion',
	'Class:NetworkCable/Attribute:finalclass' => 'Classe',
	'Class:NetworkCable/Attribute:finalclass+' => '',
	'Class:NetworkCable/Attribute:cabletype_id' => 'Type de câble',
	'Class:NetworkCable/Attribute:cabletype_id+' => '',
	'Class:NetworkCable/Attribute:cabletype_name' => 'Nom du type de câble',
	'Class:NetworkCable/Attribute:cabletype_name+' => '',
	'Class:NetworkCable/Attribute:cablecategory_id' => 'Categorie de câble',
	'Class:NetworkCable/Attribute:cablecategory_id+' => '',
	'Class:NetworkCable/Attribute:cablecategory_name' => 'Nom de la categorie de câble',
	'Class:NetworkCable/Attribute:cablecategory_name+' => '',
	'Class:NetworkCable/Attribute:length' => 'Longueur (m)',
	'Class:NetworkCable/Attribute:length+' => 'Longueur du câble, en mètre',
	'Class:NetworkCable/Attribute:label' => 'Etiquette',
	'Class:NetworkCable/Attribute:label+' => 'Etiquette attachée au câble',
	'Class:NetworkCable/Attribute:comment' => 'Commentaire',
	'Class:NetworkCable/Attribute:comment+' => '',
));

//
// Class: FrontEndNetworkCable
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:FrontEndNetworkCable' => 'Câble réseau frontal',
	'Class:FrontEndNetworkCable+' => 'Câble connectant 2 prises réseau par leur interface frontale',
	'Class:FrontEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id' => 'Prise réseau #1 - Frontal',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id+' => 'Première prise réseau connectée au câble via son interface frontale',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name' => 'Nom de la prise réseau #1',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name+' => '',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id' => 'Prise réseau #2 - Frontal',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id+' => 'Seconde prise réseau connectée au câble via son interface frontale',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name' => 'Nom de la prise réseau #2',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name+' => '',
));

//
// Class: BackEndNetworkCable
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:BackEndNetworkCable' => 'Câble réseau back end',
	'Class:BackEndNetworkCable+' => 'Câble connectant 2 prises réseau par leur interface back end',
	'Class:BackEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id' => 'Prise réseau #1 - Back end',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id+' => 'Première prise réseau connectée au câble via son interface back end',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name' => 'Nom de la prise réseau #1',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name+' => '',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id' => 'Prise réseau #2 - Back end',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id+' => 'Seconde prise réseau connectée au câble via son interface back end',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name' => 'Nom de la prise réseau #2',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name+' => '',
));

//
// Class: DeviceNetworkCable
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:DeviceNetworkCable' => 'Câble réseau équipement',
	'Class:DeviceNetworkCable+' => 'Câble connectant l\interface frontale d\une prise réseau à une interface physique',
	'Class:DeviceNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:DeviceNetworkCable/Attribute:networksocket_id' => 'Prise réseau - Frontal',
	'Class:DeviceNetworkCable/Attribute:networksocket_id+' => 'Prise réseau connectée au câble via son interface frontale',
	'Class:DeviceNetworkCable/Attribute:networksocket_name' => 'Nom de la prise réseau',
	'Class:DeviceNetworkCable/Attribute:networksocket_name+' => '',
	'Class:DeviceNetworkCable/Attribute:connectableci_id' => 'Equipement',
	'Class:DeviceNetworkCable/Attribute:connectableci_id+' => 'Equipement hébergeant l\'interface physique connectée au câble',
	'Class:DeviceNetworkCable/Attribute:connectableci_name' => 'Nom de l\'équipement',
	'Class:DeviceNetworkCable/Attribute:connectableci_name+' => '',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id' => 'Interface physique',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id+' => 'Interface physique connectée au câble',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name' => 'Nom de l\'interface physique',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name+' => '',
));

//
// Class: DirectNetworkCable
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:DirectNetworkCable' => 'Câble réseau direct',
	'Class:DirectNetworkCable+' => 'Câble connectant les interfaces physiques de deux équipements',
	'Class:DirectNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:DirectNetworkCable/Attribute:connectableci1_id' => 'Equipement #1',
	'Class:DirectNetworkCable/Attribute:connectableci1_id+' => 'Equipement hébergeant l\'interface physique #1 connectée au câble',
	'Class:DirectNetworkCable/Attribute:connectableci1_name' => 'Nom de l\'équipement #1',
	'Class:DirectNetworkCable/Attribute:connectableci1_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id' => 'Interface physique #1',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id+' => 'Interface physique de l\'équipement #1 connecté au câble',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name' => 'Nom de l\'interface physique #1',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name+' => '',
	'Class:DirectNetworkCable/Attribute:connectableci2_id' => 'Equipement #2',
	'Class:DirectNetworkCable/Attribute:connectableci2_id+' => 'Equipement hébergeant l\'interface physique #2 connectée au câble',
	'Class:DirectNetworkCable/Attribute:connectableci2_name' => 'Nom de l\'équipement #2',
	'Class:DirectNetworkCable/Attribute:connectableci2_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id' => 'Interface physique #2',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id+' => 'Interface physique de l\'équipement #2 connecté au câble',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name' => 'Nom de l\'interface physique #2',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name+' => '',
));

//
// Class: NetworkSocket
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:NetworkSocket' => 'Prise réseau',
	'Class:NetworkSocket+' => '',
	'Class:NetworkSocket:baseinfo' => 'Informations Générales',
	'Class:NetworkSocket:frontendinfo' => 'Informations frontales',
	'Class:NetworkSocket:backendinfo' => 'Information Back End',
	'Class:NetworkSocket:moreinfo' => 'Informations Complémentaires',
	'Class:NetworkSocket/Attribute:code' => 'Code',
	'Class:NetworkSocket/Attribute:code+' => 'Code utilisé pour identifier la prise dans son panneau ou son lieu d\'installation',
	'Class:NetworkSocket/Attribute:status' => 'Statut',
	'Class:NetworkSocket/Attribute:status+' => '',
	'Class:NetworkSocket/Attribute:status/Value:active' => 'Active',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => 'Inactive',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:location_id' => 'Lieu',
	'Class:NetworkSocket/Attribute:location_id+' => 'Localisation du rack hébergeant le panneau de brassage et la prise réseau ou salle hébergeant la prise réseau',
	'Class:NetworkSocket/Attribute:location_name' => 'Nom Lieu',
	'Class:NetworkSocket/Attribute:location_name+' => '',
	'Class:NetworkSocket/Attribute:rack_id' => 'Rack',
	'Class:NetworkSocket/Attribute:rack_id+' => 'Rack hébergeant le panneau de brassage',
	'Class:NetworkSocket/Attribute:rack_name' => 'Nom Rack',
	'Class:NetworkSocket/Attribute:rack_name+' => '',
	'Class:NetworkSocket/Attribute:patchpanel_id' => 'Panneau de brassage',
	'Class:NetworkSocket/Attribute:patchpanel_id+' => 'Panneau de brassage hébergeant la prise',
	'Class:NetworkSocket/Attribute:patchpanel_name' => 'Nom Panneau de brassage',
	'Class:NetworkSocket/Attribute:patchpanel_name+' => '',
	'Class:NetworkSocket/Attribute:org_id+' => 'Organisation du lieu. Cela définit aussi l\'organisation de la prise.',
	'Class:NetworkSocket/Attribute:comment' => 'Commentaire',
	'Class:NetworkSocket/Attribute:comment+' => '',
	'Class:NetworkSocket/Attribute:connectableci_id' => 'Equipement',
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Equipement connecté à la prise réseau. Cet attribut ne peut être utilisé conjointement avec l\'attribut Prise réseau',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Nom Equipement',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Interface physique',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Interface physique via laquelle l\'équipement est connecté à la prise réseau',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Nom Interface physique',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Prise réseau',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Prise réseau distante connectée à la prise réseau. Cet attribut ne peut être utilisé conjointement avec l\'attribut Equipement',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Nom Prise réseau',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:backendsocket_id' => 'Prise réseau de Back end',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => 'Prise réseau distante connectée à la prise réseau via le câblage de back end',
	'Class:NetworkSocket/Tab:cables_list' => 'Câbles',
	'Class:NetworkSocket/Tab:cables_list+' => 'Liste de tous les câbles connectés à une prise réseau hébergée par ce panneau de brassage',
));

//
// Class: PatchPanel
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:PatchPanel' => 'Panneau de brassage',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => 'Informations Générales',
	'Class:PatchPanel:moreinfo' => 'Informations Complémentaires',
	'Class:PatchPanel:rackinfo' => 'Informations liées au Rack',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack hébergeant le panneau de brassage',
	'Class:PatchPanel/Attribute:rack_name' => 'Nom Rack',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Capacité',
	'Class:PatchPanel/Attribute:capacity+' => 'Nombre de prises réseau du panneau de brassage',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Prises réseau',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'Liste de toutes les prises réseau du panneau de brassage',
	'Class:PatchPanel/Tab:cables_list' => 'Câbles',
	'Class:PatchPanel/Tab:cables_list+' => 'Liste de tous les câbles connectés à une prise réseau hébergée par ce panneau de brassage',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Frontaux homologues',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'Liste de tous les panneaux de brassage connectés à ce panneau par l\'intermédiaire d\'une prise réseau du panneau',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Back end homologues',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'Liste de tous les panneaux de brassage connectés à ce panneau par l\'intermédiaire du connecteur back end d\'une prise réseau du panneau',
));

//
// Class: PhysicalInterface
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Prise réseau',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Prise réseau distante connectée à l\'interface. Cet attribut ne peut être utilisé conjointement avec l\'attribut matériel distant.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id' => 'Matériel distant',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id+' => 'Matériel distant connecté à l\'interface. Cet attribut ne peut être utilisé conjointement avec l\'attribut prise réseau.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name' => 'Nom du matériel distant',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name+' => '',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id' => 'Interface physique du matériel distant',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id+' => 'Interface physique utilisée sur le matériel distant pour la connexion.',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name' => 'Nom de l\'Interface physique du matériel distant',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name+' => '',
	'Class:PhysicalInterface/Tab:cables_list' => 'Câbles',
	'Class:PhysicalInterface/Tab:cables_list+' => 'Liste de tous les câbles connectés à l\'interface',
));

//
// Class: Rack
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:Rack/Attribute:patchpanels_list' => 'Panneaux de brassages',
	'Class:Rack/Attribute:patchpanels_list+' => 'Liste de tous les panneaux de brassage hébergés par le rack',
));

//
// Menus & actions
//

Dict::Add('EN US', 'English', 'English', array(
	'Menu:TeemIpNetworking:Cabling' => 'Câblage',

	'Relation:wiring/Description' => 'Schéma de câblage',
	'Relation:wiring/DownStream' => 'Câblage...',
	'Relation:wiring/DownStream+' => 'Schéma de câblage',
	'Relation:wiring/UpStream' => 'Câblage...',
	'Relation:wiring/UpStream+' => 'Schéma de câblage',

	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'Un cable connectant les mêmes prises réseau existe déja !',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel' => 'Un panneau de brassage doit être sélectionné quand la prise appartient à un rack !',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'Une prise réseau ne peut pas être connectée A LA FOIS à une interface réseau et une autre prise réseau !',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'Une prise réseau ne peut pas être connectée à la même prise distante à travers ses 2 connecteurs de prise réseau et de prise arrière !',
	'UI:CableManagement:Action:CreateOrUpdate:PhysicalInterface:NoDualSocketAndCIAllowed' => 'Une interface physique ne peut pas être connectée à une prise réseau et à un matériel distant !',

	'teemip-cable-mgmt/Operation:CreateBackEndNetworkCables/Title' => 'Créer les câbles Back End',

	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets' => 'Créer les prises réseau',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables' => 'Créer les câbles back end',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Title' => 'Crée les câbles réseau back end pour le paneau de brassage : %1$s',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Helper' => 'Sélectionnez un paneau de brassage',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelExists' => 'Les câbles réseau back end n\'ont pu être créés : le paneau de brassage distant %1$s n\'existe pas !',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity' => 'Les câbles réseau back end n\'ont pu être créés : le paneau de brassage distant %1$s n\'a plus de capacité !',

));
