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

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:PatchPanel' => 'Panneau de brassage',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => 'Informations Générales',
	'Class:PatchPanel:moreinfo' => 'Informations Complémentaires',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack hébergeant le panneau de brassage',
	'Class:PatchPanel/Attribute:rack_name' => 'Nom Rack',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Capacité',
	'Class:PatchPanel/Attribute:capacity+' => 'Nombre de prises réseau du panneau de brassage',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Prises réseau',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'Liste de toutes les prises réseau du panneau de brassage',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Frontaux homologues',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'Liste de tous les panneaux de brassage connectés à ce panneau par l\'intermédiaire d\'une prise réseau du panneau',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Back end homologues',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'Liste de tous les panneaux de brassage connectés à ce panneau par l\'intermédiaire du connecteur back end d\'une prise réseau du panneau',
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
	'Class:NetworkSocket/Attribute:backendsocket_id' => 'prise réseau de Back end',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => 'Prise réseau distante connectée à la prise réseau via le câblage de back end',
));

//
// Class: PhysicalInterface
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Prise réseau',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Prise réseau distante connectée à l\'interface',
));

//
// Actions
//

Dict::Add('FR FR', 'French', 'Français', array(
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'Une prise réseau ne peut pas être connectée A LA FOIS à une interface réseau et une autre prise réseau !',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'Une prise réseau ne peut pas être connectée à la même prise distante à travers ses 2 connecteurs de prise réseau et de prise arrière !',
));
