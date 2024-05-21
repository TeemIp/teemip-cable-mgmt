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

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs' => 'Autorise le câblage vers une aute organisation',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs+' => 'Autorise un paneau de brassage à être connecté à un autre paneau de brassage appartenant à une autre organization pas l\'intermédiaire des câbles back end de ses prises réseau',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes' => 'Oui',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes+' => '',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no' => 'Non',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no+' => '',
));

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
	'Class:NetworkCable:baseinfo' => 'Informations Générales',
	'Class:NetworkCable:capacity' => 'Capacités',
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
	'Class:NetworkCable/Attribute:documents_list' => 'Documents',
	'Class:NetworkCable/Attribute:documents_list+' => 'Tous les documents liés à ce câble réseau',
));

//
// Class: FrontEndNetworkCable
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:FrontEndNetworkCable' => 'Câble réseau frontal',
	'Class:FrontEndNetworkCable+' => 'Câble connectant 2 prises réseau par leur interface frontale',
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
// Class: BreakoutCable
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:BreakoutCable' => 'Câble Breakout',
	'Class:BreakoutCable+' => 'Câble groupant de multiples liens pour connecter plusieurs prises de différents panneaux de brassage',
	'Class:BreakoutCable/Attribute:capacity' => 'Capacité',
	'Class:BreakoutCable/Attribute:capacity+' => 'Nombre total de liens que le câble breakout regroupe',
	'Class:BreakoutCable/Attribute:freelinks' => 'Liens libres',
	'Class:BreakoutCable/Attribute:freelinks+' => 'Nombre de liens encore libres dans le câble breakout',
	'Class:BreakoutCable/Attribute:rack1_id' => 'Rack #1',
	'Class:BreakoutCable/Attribute:rack1_id+' => 'Rack hébergeant les différents panneaux de brassage sources auxquels le câble est connecté',
	'Class:BreakoutCable/Attribute:rack1_name' => 'Nom Rack #1',
	'Class:BreakoutCable/Attribute:rack1_name+' => '',
	'Class:BreakoutCable/Attribute:rack2_id' => 'Rack #2',
	'Class:BreakoutCable/Attribute:rack2_id+' => 'Rack hébergeant les différents panneaux de brassage destinations auxquels le câble est connecté',
	'Class:BreakoutCable/Attribute:rack2_name' => 'Nom Rack #2',
	'Class:BreakoutCable/Attribute:rack2_name+' => '',
	'Class:BreakoutCable/Attribute:patchpanels_list' => 'Panneaux de brassage',
	'Class:BreakoutCable/Attribute:patchpanels_list+' => 'Liste des panneaux de brassage où le câble breakout est connecté',
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
	'Class:NetworkSocket/Attribute:external_ref' => 'Référence externe',
	'Class:NetworkSocket/Attribute:external_ref+' => 'Référence de la prise pour une organisation tierce',
	'Class:NetworkSocket/Attribute:status' => 'Statut',
	'Class:NetworkSocket/Attribute:status+' => 'Active: quand le back end et le frontal sont tous deux définis,
	 Prête: quand seul le Back end est renseigné,
	 Inactive: tous les autres cas.',
	'Class:NetworkSocket/Attribute:status/Value:active' => 'Active',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => 'Inactive',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:status/Value:ready' => 'Prête',
	'Class:NetworkSocket/Attribute:status/Value:ready+' => '',
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
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Equipement connecté à la prise réseau. Cet attribut ne peut être utilisé conjointement avec l\'attribut Prise réseau ou l\'attribut Cross connect',
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
	'Class:NetworkSocket/Attribute:crossconnect_id' => 'Cross connect',
	'Class:NetworkSocket/Attribute:crossconnect_id+' => 'Cross Connect utilisant la prise réseau. Cet attribut ne peut être utilisé conjointement avec l\'attribut Equipement',
	'Class:NetworkSocket/Attribute:crossconnect_name' => 'Nom Cross Connect',
	'Class:NetworkSocket/Attribute:crossconnect_name+' => '',
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
	'Class:PatchPanel/Attribute:external_ref' => 'Référence externe',
	'Class:PatchPanel/Attribute:external_ref+' => 'Référence du panneau de brassage pour une organisation tierce',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack hébergeant le panneau de brassage',
	'Class:PatchPanel/Attribute:rack_name' => 'Nom Rack',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:enclosure_id' => 'Chassis',
	'Class:PatchPanel/Attribute:enclosure_id+' => 'Rack hébergeant le panneau de brassage',
	'Class:PatchPanel/Attribute:enclosure_name' => 'Nom Chassis',
	'Class:PatchPanel/Attribute:enclosure_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Capacité',
	'Class:PatchPanel/Attribute:capacity+' => 'Nombre de prises réseau du panneau de brassage',
	'Class:PatchPanel/Attribute:free_sockets' => 'Prises libres',
	'Class:PatchPanel/Attribute:free_sockets+' => 'Nombre de prises réseau dispobibles sur le panneau: non encore créées, inactives ou prêtes',
	'Class:PatchPanel/Attribute:ready_sockets' => 'Prises prêtes',
	'Class:PatchPanel/Attribute:ready_sockets+' => 'Nombre de prises réseau \'prêtes\' sur le panneau',
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
// Class: lnkBreakoutCableToPatchPanel
//

Dict::Add('FR FR', 'English', 'English', array(
	'Class:lnkBreakoutCableToPatchPanel' => 'Lien Câble Breakout / Panneau de Brassage',
	'Class:lnkBreakoutCableToPatchPanel+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id' => 'Câble Breakout',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label' => 'Etiquette Câble Breakout',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id' => 'Panneau de Brassage',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name' => 'Nom Panneau de Brassage',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks' => 'Liens utilisés',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks+' => '',
));

//
// Class: CrossConnect
//

Dict::Add('FR FR', 'English', 'English', array(
	'Class:CrossConnect' => 'Cross Connect',
	'Class:CrossConnect+' => 'Câblage nécessaire pour établir un lien direct entre 2 unités distinctes',
	'Class:CrossConnect:baseinfo' => 'Informations Générales',
	'Class:CrossConnect:localinfo' => 'Informations sur l\Unité Locale',
	'Class:CrossConnect:remoteinfo' => 'Informations sur l\'Unité Homologue',
	'Class:CrossConnect/Tab:wiring' => 'Câblage',
	'Class:CrossConnect/Tab:wiring+' => 'Affiche le câblage entre les paneaux de brassage du local et de son homologue',
	'Class:CrossConnect/Attribute:ref' => 'Référence',
	'Class:CrossConnect/Attribute:ref+' => 'Référence du cross connect pour l\'organisation locale',
	'Class:CrossConnect/Attribute:remote_org_id' => 'Organisation homologue',
	'Class:CrossConnect/Attribute:remote_org_id+' => 'Organisation homologue du cross connect',
	'Class:CrossConnect/Attribute:remote_ref' => 'Référence homologue',
	'Class:CrossConnect/Attribute:remote_ref+' => 'Référence du cross connect pour l\'organisation homologue',
	'Class:CrossConnect/Attribute:status' => 'Statut',
	'Class:CrossConnect/Attribute:status+' => 'Statut opérational du cross connect',
	'Class:CrossConnect/Attribute:status/Value:construction' => 'Construction',
	'Class:CrossConnect/Attribute:status/Value:construction+' => '',
	'Class:CrossConnect/Attribute:status/Value:production' => 'Production',
	'Class:CrossConnect/Attribute:status/Value:production+' => '',
	'Class:CrossConnect/Attribute:status/Value:cancellation' => 'Annulation',
	'Class:CrossConnect/Attribute:status/Value:cancellation+' => '',
	'Class:CrossConnect/Attribute:status/Value:obsolete' => 'Obsolète',
	'Class:CrossConnect/Attribute:status/Value:obsolete+' => '',
	'Class:CrossConnect/Attribute:cablecategory_id' => 'Categorie & type de câble',
	'Class:CrossConnect/Attribute:cablecategory_id+' => 'Categorie et type du câble reliant les 2 entités',
	'Class:CrossConnect/Attribute:cablecategory_name' => 'Nom catégorie du câble',
	'Class:CrossConnect/Attribute:cablecategory_name+' => '',
	'Class:CrossConnect/Attribute:location_id' => 'Lieu',
	'Class:CrossConnect/Attribute:location_id+' => 'Lieu du rack contenant le paneau de brassage et les prises réseau de l\'unité locale',
	'Class:CrossConnect/Attribute:location_name' => 'Nom lieu',
	'Class:CrossConnect/Attribute:location_name+' => '',
	'Class:CrossConnect/Attribute:rack_id' => 'Rack',
	'Class:CrossConnect/Attribute:rack_id+' => 'Rack hébergeant le panneau de brassage',
	'Class:CrossConnect/Attribute:rack_name' => 'Nom Rack',
	'Class:CrossConnect/Attribute:rack_name+' => '',
	'Class:CrossConnect/Attribute:patchpanel_id' => 'Panneau de brassage',
	'Class:CrossConnect/Attribute:patchpanel_id+' => 'Panneau de brassage hébergeant la ou les prise(s) réseau locale(s)',
	'Class:CrossConnect/Attribute:patchpanel_name' => 'Nom panneau de brassage',
	'Class:CrossConnect/Attribute:patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:networksocket1_id' => 'Prise réseau primaire',
	'Class:CrossConnect/Attribute:networksocket1_id+' => 'Prise réseau primaire à l\'extrémité locale du cross connect',
	'Class:CrossConnect/Attribute:networksocket1_name' => 'Nom prise réseau primaire',
	'Class:CrossConnect/Attribute:networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:networksocket2_id' => 'Prise réseau secondaire',
	'Class:CrossConnect/Attribute:networksocket2_id+' => 'Prise réseau secondaire, et optionnelle, à l\'extrémité locale du cross connect',
	'Class:CrossConnect/Attribute:networksocket2_name' => 'Nom prise réseau secondaire',
	'Class:CrossConnect/Attribute:networksocket2_name+' => '',
	'Class:CrossConnect/Attribute:remote_location_id' => 'Lieu homologue',
	'Class:CrossConnect/Attribute:remote_location_id+' => 'Lieu du rack contenant le paneau de brassage et les prises réseau de l\'unité homologue',
	'Class:CrossConnect/Attribute:remote_location_name' => 'Nom lieu homologue',
	'Class:CrossConnect/Attribute:remote_location_name+' => '',
	'Class:CrossConnect/Attribute:remote_rack_id' => 'Rack homologue',
	'Class:CrossConnect/Attribute:remote_rack_id+' => 'Rack hébergeant le paneau de brassage homologue',
	'Class:CrossConnect/Attribute:remote_rack_name' => 'Nom rack homologue',
	'Class:CrossConnect/Attribute:remote_rack_name+' => '',
	'Class:CrossConnect/Attribute:remote_patchpanel_id' => 'Paneau de brassage homologue',
	'Class:CrossConnect/Attribute:remote_patchpanel_id+' => 'Panneau de brassage hébergeant la ou les prise(s) réseau homologue(s)',
	'Class:CrossConnect/Attribute:remote_patchpanel_name' => 'Nom paneau de brassage homologue',
	'Class:CrossConnect/Attribute:remote_patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket1_id' => 'Prise réseau primaire homologue',
	'Class:CrossConnect/Attribute:remote_networksocket1_id+' => 'Prise réseau primaire à l\'extrémité homologue du cross connect',
	'Class:CrossConnect/Attribute:remote_networksocket1_name' => 'Nom prise réseau primaire homologue',
	'Class:CrossConnect/Attribute:remote_networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket2_id' => 'Prise réseau secondaire homologue',
	'Class:CrossConnect/Attribute:remote_networksocket2_id+' => 'Prise réseau secondaire à l\'extrémité homologue du cross connect',
	'Class:CrossConnect/Attribute:remote_networksocket2_name' => 'Nom prise réseau secondaire homologue',
	'Class:CrossConnect/Attribute:remote_networksocket2_name+' => '',
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

Dict::Add('FR FR', 'English', 'English', array(
	'Menu:TeemIpNetworking:Cabling' => 'Câblage',

	'Relation:wiring/Description' => 'Schéma de câblage',
	'Relation:wiring/DownStream' => 'Câblage...',
	'Relation:wiring/DownStream+' => 'Schéma de câblage',
	'Relation:wiring/UpStream' => 'Câblage...',
	'Relation:wiring/UpStream+' => 'Schéma de câblage',

	'teemip-cable-mgmt/Operation:CreateBackEndNetworkCables/Title' => 'Créer les câbles Back End',
	'teemip-cable-mgmt/Operation:ListAvailableWirings/Title' => 'Chemins de câblage',

	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'Un cable connectant les mêmes prises réseau existe déja !',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel' => 'Un panneau de brassage doit être sélectionné quand la prise appartient à un rack !',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'Une prise réseau ne peut pas être connectée A LA FOIS à une interface réseau et une autre prise réseau !',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndCrossConnect' => 'Une prise réseau ne peut pas être connectée A LA FOIS à une interface réseau et un cross connect!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToSocketAndCrossConnect' => 'Une prise réseau ne peut pas être connectée A LA FOIS à une prise réseau et un cross connect!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'Une prise réseau ne peut pas être connectée à la même prise distante à travers ses 2 connecteurs de prise réseau et de prise arrière !',

	'UI:CableManagement:Action:CreateOrUpdate:PhysicalInterface:NoDualSocketAndCIAllowed' => 'Une interface physique ne peut pas être connectée à une prise réseau et à un matériel distant !',

	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets' => 'Créer les prises réseau',
	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoLocationDefined' => 'Les prises réseau ne peuvent pas être crées car aucun lieu n\'est configuré au niveau du paneau de brassage !',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables' => 'Créer les câbles back end',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Title' => 'Crée les câbles réseau back end pour le panneau de brassage : %1$s',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Helper' => 'Sélectionnez un panneau de brassage',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelAvailable' => 'Aucun panneau de brassage n\'est en fait disponible pour cette opération !',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelExists' => 'Les câbles réseau back end n\'ont pu être créés : le panneau de brassage distant %1$s n\'existe pas !',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity' => 'Les câbles réseau back end n\'ont pu être créés : le panneau de brassage distant %1$s n\'a plus de capacité !',

	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotInBreakoutCableRacks' => 'Le panneau de brassage %1$s est hébergé par aucun des racks que le câble breakout connecte !',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotEnoughCapacity' => 'Le panneau de brassage %1$s a une capacité trop faible pour le nombre de liens demandés!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:BreakoutCableNotEnoughCapacity' => 'Le câble breakout a une capacité trop faible pour le nombre de liens demandés par le panneau de brassage %1$s!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:NotEnoughCapacityInBreakoutCableRacks' => 'Il n\'y a pas assez de liens dans le câble breakout pour les liens demandés !',

	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothMainSocketsFilled' => 'Le cross connect ne peut passer en production sans que les deux prises réseau primaires soient renseignées !',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothSecondarySocketsFilled' => 'Si une prise réseau secondaire est renseignée, l\'autre doit aussi être renseignée !',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings' => 'Rechercher des chemins de câblage',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Title' => 'Liste des chemins de câblage possibles pour le %1$s: %2$s',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Helper' => 'Sélectionez et activez un chemin',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxRackLevelIsTooShort' => 'Le nombre maximum de racks à traverser (%1$s) ne peut être plus petit que 1 !',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxOffersIsTooLow' => 'Le nombre d\'offres attendues (%1$s) ne peut être plus petit que 1 !',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:NumberOfOffers' => '%1$s chemins trouvés sur %2$s demandés ',
));
