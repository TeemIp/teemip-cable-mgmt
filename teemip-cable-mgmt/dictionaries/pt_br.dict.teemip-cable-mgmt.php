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

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs' => 'Permitir cabeamento para outras organizações',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs+' => 'Permitir que um patch panel da organização seja conectado a um patch panel remoto pertencente a outra organização através dos cabos de conexão traseira (back-end) de seus pontos de rede',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes' => 'Sim',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:yes+' => '',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no' => 'Não',
	'Class:IPConfig/Attribute:allow_backendnetworkcable_to_cross_orgs/Value:no+' => '',
));

//
// Class: CableType
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:CableType' => 'Tipo de Cabo',
	'Class:CableType+' => '',
	'Class:CableType/Attribute:description' => 'Descrição',
	'Class:CableType/Attribute:description+' => '',
	'Class:CableType/Attribute:cablecategories_list' => 'Categorias de cabo',
	'Class:CableType/Attribute:cablecategories_list+' => '',
));

//
// Class: CableCategory
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:CableCategory' => 'Categoria de Cabo',
	'Class:CableCategory+' => '',
	'Class:CableCategory/Name' => '%1$s - %2$s',
	'Class:CableCategory/Attribute:cabletype_id' => 'Tipo de cabo',
	'Class:CableCategory/Attribute:cabletype_id+' => '',
	'Class:CableCategory/Attribute:description' => 'Descrição',
	'Class:CableCategory/Attribute:description+' => '',
));

//
// Class: NetworkCable
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NetworkCable' => 'Cabo de Rede',
	'Class:NetworkCable+' => '',
	'Class:NetworkCable/Name' => '%1$s',
	'Class:NetworkCable:baseinfo' => 'Informações Gerais',
	'Class:NetworkCable:capacity' => 'Capacidades',
	'Class:NetworkCable:endpoints' => 'Pontos de Conexão',
    'Class:NetworkCable:membership' => 'Afiliação',
	'Class:NetworkCable/Attribute:finalclass' => 'Classe',
	'Class:NetworkCable/Attribute:finalclass+' => '',
	'Class:NetworkCable/Attribute:cabletype_id' => 'Tipo de cabo',
	'Class:NetworkCable/Attribute:cabletype_id+' => '',
	'Class:NetworkCable/Attribute:cabletype_name' => 'Nome do tipo de cabo',
	'Class:NetworkCable/Attribute:cabletype_name+' => '',
	'Class:NetworkCable/Attribute:cablecategory_id' => 'Categoria de cabo',
	'Class:NetworkCable/Attribute:cablecategory_id+' => '',
	'Class:NetworkCable/Attribute:cablecategory_name' => 'Nome da categoria de cabo',
	'Class:NetworkCable/Attribute:cablecategory_name+' => '',
	'Class:NetworkCable/Attribute:length' => 'Comprimento (m)',
	'Class:NetworkCable/Attribute:length+' => 'Comprimento do cabo, em metros',
	'Class:NetworkCable/Attribute:label' => 'Etiqueta',
	'Class:NetworkCable/Attribute:label+' => 'Etiqueta fixada ao cabo',
	'Class:NetworkCable/Attribute:comment' => 'Comentário',
	'Class:NetworkCable/Attribute:comment+' => '',
	'Class:NetworkCable/Attribute:documents_list' => 'Documentos',
	'Class:NetworkCable/Attribute:documents_list+' => 'Todos os documentos vinculados a este cabo de rede',
));

//
// Class: FrontEndNetworkCable
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:FrontEndNetworkCable' => 'Cabo de Rede Front-End',
	'Class:FrontEndNetworkCable+' => 'Cabo que conecta 2 pontos de rede através de sua conexão frontal (front-end)',
	'Class:FrontEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id' => 'Ponto de rede(socket) #1 - Front-end',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id+' => 'Primeiro ponto de rede (front-end) ao qual o cabo está conectado',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name' => 'Nome do ponto de rede(socket) #1',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name+' => '',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id' => 'Ponto de rede(socket) #2 - Front-end',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id+' => 'Segundo ponto de rede (front-end) ao qual o cabo está conectado',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name' => 'Nome do ponto de rede(socket) #2',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name+' => '',
));

//
// Class: BackEndNetworkCable
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:BackEndNetworkCable' => 'Cabo de Rede Back-End',
	'Class:BackEndNetworkCable+' => 'Cabo que conecta 2 pontos de rede através de sua conexão traseira (back-end)',
	'Class:BackEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id' => 'Ponto de rede(socket) #1 - Back-end',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id+' => 'Primeiro ponto de rede (back-end) ao qual o cabo está conectado',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name' => 'Nome do ponto de rede(socket) #1',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name+' => '',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id' => 'Ponto de rede(socket) #2 - Back-end',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id+' => 'Segundo ponto de rede (back-end) ao qual o cabo está conectado',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name' => 'Nome do ponto de rede(socket) #2',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name+' => '',
    'Class:BackEndNetworkCable/Attribute:breakoutcable_id' => 'Cabo Breakout',
    'Class:BackEndNetworkCable/Attribute:breakoutcable_id+' => 'Cabo Breakout ao qual o cabo de rede back-end pertence',
    'Class:BackEndNetworkCable/Attribute:breakoutcable_name' => 'Nome do cabo Breakout',
    'Class:BackEndNetworkCable/Attribute:breakoutcable_name+' => '',
));

//
// Class: DeviceNetworkCable
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:DeviceNetworkCable' => 'Cabo de Rede de Dispositivo',
	'Class:DeviceNetworkCable+' => 'Cabo que conecta um ponto de rede (front-end) a uma interface física',
	'Class:DeviceNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:DeviceNetworkCable/Attribute:networksocket_id' => 'Ponto de rede(socket) - Front-end',
	'Class:DeviceNetworkCable/Attribute:networksocket_id+' => 'Ponto de rede (front-end) ao qual o cabo está conectado',
	'Class:DeviceNetworkCable/Attribute:networksocket_name' => 'Nome do ponto de rede',
	'Class:DeviceNetworkCable/Attribute:networksocket_name+' => '',
	'Class:DeviceNetworkCable/Attribute:connectableci_id' => 'Dispositivo',
	'Class:DeviceNetworkCable/Attribute:connectableci_id+' => 'Dispositivo que hospeda a interface física à qual o cabo está conectado',
	'Class:DeviceNetworkCable/Attribute:connectableci_name' => 'Nome do dispositivo',
	'Class:DeviceNetworkCable/Attribute:connectableci_name+' => '',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id' => 'Interface física',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id+' => 'Interface física à qual o cabo está conectado',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name' => 'Nome da interface física',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name+' => '',
));

//
// Class: DirectNetworkCable
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:DirectNetworkCable' => 'Cabo de Rede Direto',
	'Class:DirectNetworkCable+' => 'Cabo que conecta diretamente a interface física de 2 dispositivos',
	'Class:DirectNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:DirectNetworkCable/Attribute:connectableci1_id' => 'Dispositivo #1',
	'Class:DirectNetworkCable/Attribute:connectableci1_id+' => 'Dispositivo que hospeda a interface física #1 à qual o cabo está conectado',
	'Class:DirectNetworkCable/Attribute:connectableci1_name' => 'Nome do dispositivo #1',
	'Class:DirectNetworkCable/Attribute:connectableci1_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id' => 'Interface física #1',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_id+' => 'Interface física do dispositivo #1 à qual o cabo está conectado',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name' => 'Nome da interface física #1',
	'Class:DirectNetworkCable/Attribute:physicalinterface1_name+' => '',
	'Class:DirectNetworkCable/Attribute:connectableci2_id' => 'Dispositivo #2',
	'Class:DirectNetworkCable/Attribute:connectableci2_id+' => 'Dispositivo que hospeda a interface física #2 à qual o cabo está conectado',
	'Class:DirectNetworkCable/Attribute:connectableci2_name' => 'Nome do dispositivo #2',
	'Class:DirectNetworkCable/Attribute:connectableci2_name+' => '',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id' => 'Interface física #2',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_id+' => 'Interface física do dispositivo #2 à qual o cabo está conectado',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name' => 'Nome da interface física #2',
	'Class:DirectNetworkCable/Attribute:physicalinterface2_name+' => '',
));

//
// Class: BreakoutCable
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:BreakoutCable' => 'Cabo Breakout',
	'Class:BreakoutCable+' => 'Cabo que combina múltiplos links para conectar diversos pontos de rede de diferentes patch panels',
	'Class:BreakoutCable/Name' => '%1$s <-> %2$s - %3$s',
	'Class:BreakoutCable/Attribute:capacity' => 'Capacidade',
	'Class:BreakoutCable/Attribute:capacity+' => 'Número total de links que o cabo breakout está combinando',
	'Class:BreakoutCable/Attribute:freelinks' => 'Links Livres',
	'Class:BreakoutCable/Attribute:freelinks+' => 'Número de links que permanecem disponíveis dentro do cabo breakout',
	'Class:BreakoutCable/Attribute:rack1_id' => 'Rack #1',
	'Class:BreakoutCable/Attribute:rack1_id+' => 'Rack que hospeda os diferentes patch panels de origem aos quais o cabo está conectado',
	'Class:BreakoutCable/Attribute:rack1_name' => 'Nome do Rack #1',
	'Class:BreakoutCable/Attribute:rack1_name+' => '',
	'Class:BreakoutCable/Attribute:rack2_id' => 'Rack #2',
	'Class:BreakoutCable/Attribute:rack2_id+' => 'Rack que hospeda os diferentes patch panels de destino aos quais o cabo está conectado',
	'Class:BreakoutCable/Attribute:rack2_name' => 'Nome do Rack #2',
	'Class:BreakoutCable/Attribute:rack2_name+' => '',
	'Class:BreakoutCable/Attribute:patchpanels_list' => 'Patch Panels',
	'Class:BreakoutCable/Attribute:patchpanels_list+' => 'Lista de patch panels aos quais o cabo breakout está conectado',
    'Class:BreakoutCable/Attribute:backendnetworkcable_list' => 'Cabos de Rede Back-End',
    'Class:BreakoutCable/Attribute:backendnetworkcable_list+' => 'Lista de cabos de rede back-end que fazem parte do cabo breakout',
));

//
// Class: NetworkSocket
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NetworkSocket' => 'Ponto de Rede',
	'Class:NetworkSocket+' => '',
	'Class:NetworkSocket:baseinfo' => 'Informações Gerais',
	'Class:NetworkSocket:frontendinfo' => 'Informações de Front-End',
	'Class:NetworkSocket:backendinfo' => 'Informações de Back-End',
	'Class:NetworkSocket:moreinfo' => 'Mais Informações',
	'Class:NetworkSocket/Attribute:code' => 'Código',
	'Class:NetworkSocket/Attribute:code+' => 'Código usado para identificar o ponto de rede em seu patch panel ou localização',
	'Class:NetworkSocket/Attribute:external_ref' => 'Referência externa',
	'Class:NetworkSocket/Attribute:external_ref+' => 'Referência que pode ser relevante para terceiros',
	'Class:NetworkSocket/Attribute:status' => 'Status',
	'Class:NetworkSocket/Attribute:status+' => 'Ativo: quando tanto o front-end quanto o back-end estão definidos,
	 Pronto: quando apenas o back-end está definido,
	 Inativo: Todos os outros casos.',
	'Class:NetworkSocket/Attribute:status/Value:active' => 'Ativo',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => 'Inativo',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:status/Value:ready' => 'Pronto',
	'Class:NetworkSocket/Attribute:status/Value:ready+' => '',
	'Class:NetworkSocket/Attribute:location_id' => 'Localização',
	'Class:NetworkSocket/Attribute:location_id+' => 'Localização do rack contendo o patch panel e o ponto de rede ou sala que hospeda o ponto de rede',
	'Class:NetworkSocket/Attribute:location_name' => 'Nome da localização',
	'Class:NetworkSocket/Attribute:location_name+' => '',
	'Class:NetworkSocket/Attribute:rack_id' => 'Rack',
	'Class:NetworkSocket/Attribute:rack_id+' => 'Rack contendo o patch panel',
	'Class:NetworkSocket/Attribute:rack_name' => 'Nome do rack',
	'Class:NetworkSocket/Attribute:rack_name+' => '',
	'Class:NetworkSocket/Attribute:patchpanel_id' => 'Patch panel',
	'Class:NetworkSocket/Attribute:patchpanel_id+' => 'Patch panel que hospeda o ponto de rede',
	'Class:NetworkSocket/Attribute:patchpanel_name' => 'Nome do patch panel',
	'Class:NetworkSocket/Attribute:patchpanel_name+' => '',
    'Class:NetworkSocket/Attribute:org_id' => 'Organização',
	'Class:NetworkSocket/Attribute:org_id+' => 'A organização do ponto de rede é a do patch panel, se o ponto pertencer a um patch panel, caso contrário, a da localização.',
	'Class:NetworkSocket/Attribute:comment' => 'Comentário',
	'Class:NetworkSocket/Attribute:comment+' => '',
	'Class:NetworkSocket/Attribute:connectableci_id' => 'Dispositivo',
	//'Class:NetworkSocket/Attribute:connectableci_id+' => 'Dispositivo conectado ao soquete de rede. Este atributo não pode ser preenchido ao mesmo tempo que o Soquete de rede ou os atributos de Conexão cruzada',
	'Class:NetworkSocket/Attribute:connectableci_id+' => 'Dispositivo conectado ao ponto de rede. Este atributo não pode ser preenchido ao mesmo tempo que o do Ponto de rede.',
	'Class:NetworkSocket/Attribute:connectableci_name' => 'Nome do dispositivo',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => 'Interface física',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => 'Interface física através da qual o dispositivo está conectado ao ponto de rede',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => 'Nome da interface física',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => 'Ponto de rede',
	'Class:NetworkSocket/Attribute:networksocket_id+' => 'Ponto de rede remoto conectado ao ponto de rede. Este atributo não pode ser preenchido ao mesmo tempo que o do Dispositivo.',
	'Class:NetworkSocket/Attribute:networksocket_name' => 'Nome do ponto de rede',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:crossconnect_id' => 'Cross-Connect',
 	//'Class:NetworkSocket/Attribute:crossconnect_id+' => 'Conexão cruzada utilizando o soquete de rede. Este atributo não pode ser preenchido ao mesmo tempo que o atributo de Dispositivo',
	'Class:NetworkSocket/Attribute:crossconnect_id+' => 'Cross-Connect usando o ponto de rede.',
	'Class:NetworkSocket/Attribute:crossconnect_name' => 'Nome do Cross-Connect',
	'Class:NetworkSocket/Attribute:crossconnect_name+' => '',
	'Class:NetworkSocket/Attribute:backendsocket_id' => 'Ponto de rede back-end',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => 'Ponto de rede remoto conectado através de cabos back-end',
	'Class:NetworkSocket/Tab:cables_list' => 'Cabos',
	'Class:NetworkSocket/Tab:cables_list+' => 'Lista de todos os cabos conectados ao ponto de rede',
    'Class:NetworkSocket/Attribute:cabletype_id' => 'Tipo de cabo',
    'Class:NetworkSocket/Attribute:cabletype_id+' => 'Tipo de cabo a ser usada com o ponto de rede',
    'Class:NetworkSocket/Attribute:cabletype_name' => 'Nome do tipo de cabo',
    'Class:NetworkSocket/Attribute:cabletype_name+' => '',
    'Class:NetworkSocket/Attribute:cablecategory_id' => 'Categoria de cabo',
    'Class:NetworkSocket/Attribute:cablecategory_id+' => 'Categoria de cabo a ser usada com o ponto de rede',
    'Class:NetworkSocket/Attribute:cablecategory_name' => 'Nome da categoria de cabo',
    'Class:NetworkSocket/Attribute:cablecategory_name+' => '',
));

//
// Class: PatchPanel
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PatchPanel' => 'Patch Panel',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => 'Informações Gerais',
	'Class:PatchPanel:connectivity' => 'Conectividade',
	'Class:PatchPanel:rackinfo' => 'Informações do Rack',
	'Class:PatchPanel/Attribute:external_ref' => 'Referência externa',
	'Class:PatchPanel/Attribute:external_ref+' => 'Referência que pode ser relevante para terceiros',
	'Class:PatchPanel/Attribute:rack_id' => 'Rack',
	'Class:PatchPanel/Attribute:rack_id+' => 'Rack que hospeda o patch panel',
	'Class:PatchPanel/Attribute:rack_name' => 'Nome do rack',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:enclosure_id' => 'Enclosure',
	'Class:PatchPanel/Attribute:enclosure_id+' => 'Enclosure que hospeda o patch panel',
	'Class:PatchPanel/Attribute:enclosure_name' => 'Nome do enclosure',
	'Class:PatchPanel/Attribute:enclosure_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => 'Capacidade',
	'Class:PatchPanel/Attribute:capacity+' => 'Número de pontos de rede que o painel pode hospedar',
	'Class:PatchPanel/Attribute:free_sockets' => 'Pontos livres',
	'Class:PatchPanel/Attribute:free_sockets+' => 'Número de pontos de rede ainda disponíveis no painel: não criados, inativos ou prontos',
	'Class:PatchPanel/Attribute:ready_sockets' => 'Pontos prontos',
	'Class:PatchPanel/Attribute:ready_sockets+' => 'Número de pontos de rede com status \'pronto\'',
	'Class:PatchPanel/Attribute:networksockets_list' => 'Pontos de rede',
	'Class:PatchPanel/Attribute:networksockets_list+' => 'Lista de todos os pontos de rede do patch panel',
	'Class:PatchPanel/Tab:cables_list' => 'Cabos',
	'Class:PatchPanel/Tab:cables_list+' => 'Lista de todos os cabos conectados a um ponto de rede hospedado pelo patch panel',
	'Class:PatchPanel/Tab:frontendpanels_list' => 'Painéis front-end pares',
	'Class:PatchPanel/Tab:frontendpanels_list+' => 'Lista de todos os patch panels conectados ao atual através do ponto de rede de seus pontos hospedados',
	'Class:PatchPanel/Tab:backendpanels_list' => 'Painéis back-end pares',
	'Class:PatchPanel/Tab:backendpanels_list+' => 'Lista de todos os patch panels conectados ao atual através do ponto de rede back-end de seus pontos hospedados',
    'Class:PatchPanel/Attribute:cabletype_id' => 'Tipo de cabo',
    'Class:PatchPanel/Attribute:cabletype_id+' => 'Tipo de cabo a ser usada com o patch panel',
    'Class:PatchPanel/Attribute:cabletype_name' => 'Nome do tipo de cabo',
    'Class:PatchPanel/Attribute:cabletype_name+' => '',
    'Class:PatchPanel/Attribute:cablecategory_id' => 'Categoria de cabo',
    'Class:PatchPanel/Attribute:cablecategory_id+' => 'Categoria de cabo principal a ser usada com o patch panel',
    'Class:PatchPanel/Attribute:cablecategory_name' => 'Nome da categoria de cabo',
    'Class:PatchPanel/Attribute:cablecategory_name+' => '',
));

//
// Class: lnkBreakoutCableToPatchPanel
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkBreakoutCableToPatchPanel' => 'Link Cabo Breakout / Patch Panel',
	'Class:lnkBreakoutCableToPatchPanel+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Name' => '%1$s / %2$s',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id' => 'Cabo Breakout',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_id+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label' => 'Etiqueta do Cabo Breakout',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:breakoutcable_label+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id' => 'Patch Panel',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_id+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name' => 'Nome do Patch Panel',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:patchpanel_name+' => '',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks' => 'Links Usados',
	'Class:lnkBreakoutCableToPatchPanel/Attribute:usedlinks+' => '',
));

//
// Class: CrossConnect
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:CrossConnect' => 'Cross-Connect',
	'Class:CrossConnect+' => 'Cabeamento necessário para estabelecer um link direto entre duas unidades de hardware separadas',
	'Class:CrossConnect:baseinfo' => 'Informações Gerais',
	'Class:CrossConnect:localinfo' => 'Informações da Unidade Local',
	'Class:CrossConnect:remoteinfo' => 'Informações da Unidade Remota',
	'Class:CrossConnect/Tab:wiring' => 'Diagrama de Conexão',
	'Class:CrossConnect/Tab:wiring+' => 'Exibe o layout de conexão entre os patch panels local e remoto',
	'Class:CrossConnect/Tab:cables_list' => 'Cabos',
	'Class:CrossConnect/Tab:cables_list+' => 'Lista de todos os cabos que compõem os Cross-Connects',
	'Class:CrossConnect/Attribute:ref' => 'Referência',
	'Class:CrossConnect/Attribute:ref+' => 'Referência do cross-connect para a organização local',
	'Class:CrossConnect/Attribute:remote_org_id' => 'Organização remota',
	'Class:CrossConnect/Attribute:remote_org_id+' => 'Organização remota para o cross-connect',
	'Class:CrossConnect/Attribute:remote_ref' => 'Referência remota',
	'Class:CrossConnect/Attribute:remote_ref+' => 'Referência do cross-connect para a organização remota',
	'Class:CrossConnect/Attribute:status' => 'Status',
	'Class:CrossConnect/Attribute:status+' => 'Status operacional do cross-connect',
	'Class:CrossConnect/Attribute:status/Value:construction' => 'Em Construção',
	'Class:CrossConnect/Attribute:status/Value:construction+' => '',
	'Class:CrossConnect/Attribute:status/Value:production' => 'Em Produção',
	'Class:CrossConnect/Attribute:status/Value:production+' => '',
	'Class:CrossConnect/Attribute:status/Value:cancellation' => 'Em Cancelamento',
	'Class:CrossConnect/Attribute:status/Value:cancellation+' => '',
	'Class:CrossConnect/Attribute:status/Value:obsolete' => 'Obsoleto',
	'Class:CrossConnect/Attribute:status/Value:obsolete+' => '',
	'Class:CrossConnect/Attribute:cablecategory_id' => 'Categoria e tipo de cabo',
	'Class:CrossConnect/Attribute:cablecategory_id+' => 'Categoria e tipo dos cabos que ligam os dois pares',
	'Class:CrossConnect/Attribute:cablecategory_name' => 'Nome da categoria de cabo',
	'Class:CrossConnect/Attribute:cablecategory_name+' => '',
	'Class:CrossConnect/Attribute:location_id' => 'Localização',
	'Class:CrossConnect/Attribute:location_id+' => 'Localização do rack contendo o patch panel e o(s) ponto(s) de rede da extremidade local do cross-connect',
	'Class:CrossConnect/Attribute:location_name' => 'Nome da localização',
	'Class:CrossConnect/Attribute:location_name+' => '',
	'Class:CrossConnect/Attribute:rack_id' => 'Rack',
	'Class:CrossConnect/Attribute:rack_id+' => 'Rack que hospeda o patch panel',
	'Class:CrossConnect/Attribute:rack_name' => 'Nome do rack',
	'Class:CrossConnect/Attribute:rack_name+' => '',
	'Class:CrossConnect/Attribute:patchpanel_id' => 'Patch panel',
	'Class:CrossConnect/Attribute:patchpanel_id+' => 'Patch panel que hospeda o(s) ponto(s) de rede',
	'Class:CrossConnect/Attribute:patchpanel_name' => 'Nome do patch panel',
	'Class:CrossConnect/Attribute:patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:networksocket1_id' => 'Ponto de rede primário',
	'Class:CrossConnect/Attribute:networksocket1_id+' => 'Ponto de rede primário na extremidade local do cross-connect',
	'Class:CrossConnect/Attribute:networksocket1_name' => 'Nome do ponto de rede primário',
	'Class:CrossConnect/Attribute:networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:networksocket2_id' => 'Ponto de rede secundário',
	'Class:CrossConnect/Attribute:networksocket2_id+' => 'Segundo ponto de rede opcional usado em caso de conexão dupla',
	'Class:CrossConnect/Attribute:networksocket2_name' => 'Nome do ponto de rede secundário',
	'Class:CrossConnect/Attribute:networksocket2_name+' => '',
    'Class:CrossConnect/Attribute:connectableci_id' => 'Dispositivo',
    'Class:CrossConnect/Attribute:connectableci_id+' => 'Dispositivo conectado ao lado local do Cross-Connect',
    'Class:CrossConnect/Attribute:connectableci_name' => 'Nome do dispositivo',
    'Class:CrossConnect/Attribute:connectableci_name+' => '',
    'Class:CrossConnect/Attribute:physicalinterface_id' => 'Interface física',
    'Class:CrossConnect/Attribute:physicalinterface_id+' => 'Interface física através da qual o dispositivo local está conectado ao cross-connect',
    'Class:CrossConnect/Attribute:physicalinterface_name' => 'Nome da interface física',
    'Class:CrossConnect/Attribute:physicalinterface_name+' => '',
	'Class:CrossConnect/Attribute:remote_location_id' => 'Localização remota',
	'Class:CrossConnect/Attribute:remote_location_id+' => 'Localização do rack contendo o patch panel e o(s) ponto(s) de rede da extremidade remota do cross-connect',
	'Class:CrossConnect/Attribute:remote_location_name' => 'Nome da localização remota',
	'Class:CrossConnect/Attribute:remote_location_name+' => '',
	'Class:CrossConnect/Attribute:remote_rack_id' => 'Rack remoto',
	'Class:CrossConnect/Attribute:remote_rack_id+' => 'Rack remoto que hospeda o patch panel',
	'Class:CrossConnect/Attribute:remote_rack_name' => 'Nome do rack remoto',
	'Class:CrossConnect/Attribute:remote_rack_name+' => '',
	'Class:CrossConnect/Attribute:remote_patchpanel_id' => 'Patch panel remoto',
	'Class:CrossConnect/Attribute:remote_patchpanel_id+' => 'Patch panel remoto que hospeda o(s) ponto(s) de rede',
	'Class:CrossConnect/Attribute:remote_patchpanel_name' => 'Nome do patch panel remoto',
	'Class:CrossConnect/Attribute:remote_patchpanel_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket1_id' => 'Ponto de rede primário remoto',
	'Class:CrossConnect/Attribute:remote_networksocket1_id+' => 'Ponto de rede primário que faz par com o primário local',
	'Class:CrossConnect/Attribute:remote_networksocket1_name' => 'Nome do ponto de rede primário remoto',
	'Class:CrossConnect/Attribute:remote_networksocket1_name+' => '',
	'Class:CrossConnect/Attribute:remote_networksocket2_id' => 'Ponto de rede secundário remoto',
	'Class:CrossConnect/Attribute:remote_networksocket2_id+' => 'Segundo ponto de rede que faz par com o secundário local',
	'Class:CrossConnect/Attribute:remote_networksocket2_name' => 'Nome do ponto de rede secundário remoto',
	'Class:CrossConnect/Attribute:remote_networksocket2_name+' => '',
    'Class:CrossConnect/Attribute:remote_connectableci_id' => 'Dispositivo remoto',
    'Class:CrossConnect/Attribute:remote_connectableci_id+' => 'Dispositivo conectado na localização remota do Cross-Connect',
    'Class:CrossConnect/Attribute:remote_connectableci_name' => 'Nome do dispositivo remoto',
    'Class:CrossConnect/Attribute:remote_connectableci_name+' => '',
    'Class:CrossConnect/Attribute:remote_physicalinterface_id' => 'Interface física remota',
    'Class:CrossConnect/Attribute:remote_physicalinterface_id+' => 'Interface física através da qual o dispositivo remoto está conectado ao cross-connect',
    'Class:CrossConnect/Attribute:remote_physicalinterface_name' => 'Nome da interface física remota',
    'Class:CrossConnect/Attribute:remote_physicalinterface_name+' => '',
));

//
// Class: PhysicalInterface
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => 'Ponto de rede(socket)', //socket
	'Class:PhysicalInterface/Attribute:networksocket_id+' => 'Ponto de rede remoto conectado à interface. Este atributo não pode ser preenchido ao mesmo tempo que o dispositivo remoto.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id' => 'Dispositivo remoto',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id+' => 'Dispositivo remoto conectado à interface. Este atributo não pode ser preenchido ao mesmo tempo que o ponto de rede.',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name' => 'Nome do dispositivo remoto',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name+' => '',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id' => 'Interface física remota',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id+' => 'Interface física usada no dispositivo remoto para a conexão.',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name' => 'Nome da interface física remota',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name+' => '',
	'Class:PhysicalInterface/Tab:cables_list' => 'Cabos',
	'Class:PhysicalInterface/Tab:cables_list+' => 'Lista de todos os cabos conectados à interface física',
));

//
// Class: Rack
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Rack/Attribute:patchpanels_list' => 'Patch Panels',
	'Class:Rack/Attribute:patchpanels_list+' => 'Lista de todos os patch panels hospedados pelo rack',
));

//
// Menus & actions
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Menu:TeemIpNetworking:Cabling' => 'Cabeamento',

	'Relation:wiring/Description' => 'Diagrama de Conexão',
	'Relation:wiring/DownStream' => 'Diagrama de Conexão...',
	'Relation:wiring/DownStream+' => 'Diagrama de Conexão',
	'Relation:wiring/UpStream' => 'Diagrama de Conexão...',
	'Relation:wiring/UpStream+' => 'Diagrama de Conexão',

	'teemip-cable-mgmt/Operation:CreateBackEndNetworkCables/Title' => 'Criar Cabos Back-End',
	'teemip-cable-mgmt/Operation:ListAvailableWirings/Title' => 'Caminhos de cabeamento',

	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => 'Um cabo já está conectando os mesmos pontos de rede!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel' => 'Um patch panel precisa ser selecionado quando o ponto de rede pertence a um rack!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => 'Um ponto de rede não pode ser conectado A AMBOS uma interface e outro ponto de rede!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndCrossConnect' => 'Um ponto de rede não pode ser conectado A AMBOS uma interface e um cross-connect!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToSocketAndCrossConnect' => 'Um ponto de rede não pode ser conectado A AMBOS um ponto de rede e um cross-connect!',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => 'Um ponto de rede não pode ser conectado ao mesmo ponto remoto através de seus conectores de ponto de rede e de back-end simultaneamente!',
    'UI:CableManagement:Action:CreateOrUpdate:DeviceNetworkCable:Duplicate' => 'Um cabo já está conectando o mesmo dispositivo ou ponto de rede!',
    'UI:CableManagement:Action:CreateOrUpdate:DirectNetworkCable:Duplicate' => 'Um cabo já está conectando as mesmas interfaces físicas!',
    'UI:CableManagement:Action:CreateOrUpdate:BackEndNetworkCable:WrongBreakoutCable1' => 'O cabo breakout não está conectado a nenhum dos patch panels usados pelo cabo back-end %1$s!',
    'UI:CableManagement:Action:CreateOrUpdate:BackEndNetworkCable:WrongBreakoutCable2' => 'O cabo breakout não está conectado a todos os patch panels usados pelo cabo back-end %1$s!',

	'UI:CableManagement:Action:CreateOrUpdate:PhysicalInterface:NoDualSocketAndCIAllowed' => 'Uma interface física não pode ser conectada a ambos um ponto de rede e um dispositivo remoto!',

	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets' => 'Criar pontos de rede',
	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoLocationDefined' => 'Os pontos de rede não podem ser criados porque nenhuma localização foi definida para o patch panel!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateNetworkSockets:NoCapacity' => 'Os pontos de rede não podem ser criados porque não há capacidade restante!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables' => 'Criar cabos de rede back-end',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Title' => 'Criar cabos de rede back-end para o patch panel: %1$s',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Helper' => 'Selecione um patch panel remoto e o número de cabos a serem criados',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:Quantity' => 'Quantidade',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelAvailable' => 'Nenhum Patch panel remoto está realmente disponível para a operação!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoRemotePatchPanelExists' => 'Cabos Back-End não podem ser criados: o Patch Panel remoto %1$s não existe!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCreationRequested' => 'Nenhuma criação de cabos Back-End foi solicitada!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NoCapacity' => 'Cabos Back-End não podem ser criados: o Patch Panel remoto %1$s não possui capacidade!',
	'UI:CableManagement:Action:Create:PatchPanel:CreateBackEndNetworkCables:NotEnoughCapacity' => 'Cabos Back-End não podem ser criados: o Patch Panel remoto %1$s tem menos capacidade (%2$s) do que o necessário (%3$s)!',

	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotInBreakoutCableRacks' => 'O patch panel %1$s não pertence a nenhum dos racks que o cabo breakout conecta!',
	'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:PatchPanelNotEnoughCapacity' => 'O patch panel %1$s não tem capacidade suficiente para o número de links solicitados',
    'UI:CableManagement:Action:CreateOrUpdate:lnkBreakoutCableToPatchPanel:BreakoutCableNotEnoughCapacity' => 'Não há capacidade suficiente no cabo breakout para os links necessários!',

	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothMainSocketsFilled' => 'O cross-connect não pode ir para produção sem que ambos os pontos de rede primários estejam preenchidos!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:ProductionWithoutBothSecondarySocketsFilled' => 'Se um ponto de rede secundário for definido, o outro também deverá ser definido!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings' => 'Encontrar caminhos de conexão',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Title' => 'Lista de possíveis caminhos de conexão para %1$s: %2$s',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:Helper' => 'Selecione e ative um caminho',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxRackLevelIsTooShort' => 'O número máximo de racks a cruzar exigido (%1$s) não pode ser inferior a 1!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:MaxOffersIsTooLow' => 'O número de caminhos esperados (%1$s) não pode ser inferior a 1!', // "Offers" traduzido como "caminhos" para melhor contexto
    'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:NoPathFound' => 'Nenhum caminho foi encontrado para conectar os 2 patch panels!',
	'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:FindWirings:NumberOfOffers' => '%1$s caminhos encontrados de %2$s solicitados de ', // Manter o "de " no final se for esperado pela aplicação
    'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateCables' => 'Criar cabos',
    'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateDeviceNetworkCable:MissingEnd' => 'O cabo de rede do dispositivo não pode ser criado: pelo menos uma extremidade do cabo não está especificada!',
    'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateFrontEndNetworkCable:MissingEnd' => 'O cabo de rede front-end não pode ser criado: pelo menos uma extremidade do cabo não está especificada!',
    'UI:CableManagement:Action:CreateOrUpdate:CrossConnect:CreateNetworkCable:ConsolidateErrors' => 'Os seguintes erros foram encontrados:',
));
