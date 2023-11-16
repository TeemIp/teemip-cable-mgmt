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

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:CableType' => '电缆类型',
	'Class:CableType+' => '',
	'Class:CableType/Attribute:description' => '描述',
	'Class:CableType/Attribute:description+' => '',
	'Class:CableType/Attribute:cablecategories_list' => '电缆类别',
	'Class:CableType/Attribute:cablecategories_list+' => '',
));

//
// Class: CableCategory
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:CableCategory' => '电缆类别',
	'Class:CableCategory+' => '',
	'Class:CableCategory/Attribute:cabletype_id' => '电缆类型',
	'Class:CableCategory/Attribute:cabletype_id+' => '',
	'Class:CableCategory/Attribute:description' => '描述',
	'Class:CableCategory/Attribute:description+' => '',
));

//
// Class: NetworkCable
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:NetworkCable' => '网络电缆',
	'Class:NetworkCable+' => '',
	'Class:NetworkCable/Name' => '%1$s',
	'Class:NetworkCable:baseinfo' => '基本信息',
	'Class:NetworkCable:endpoints' => '连接点',
	'Class:NetworkCable/Attribute:finalclass' => 'Class',
	'Class:NetworkCable/Attribute:finalclass+' => '',
	'Class:NetworkCable/Attribute:cabletype_id' => '电缆类型',
	'Class:NetworkCable/Attribute:cabletype_id+' => '',
	'Class:NetworkCable/Attribute:cabletype_name' => '电缆类型名称',
	'Class:NetworkCable/Attribute:cabletype_name+' => '',
	'Class:NetworkCable/Attribute:cablecategory_id' => '电缆类别',
	'Class:NetworkCable/Attribute:cablecategory_id+' => '',
	'Class:NetworkCable/Attribute:cablecategory_name' => '电缆类别名称',
	'Class:NetworkCable/Attribute:cablecategory_name+' => '',
	'Class:NetworkCable/Attribute:length' => '长度（米）',
	'Class:NetworkCable/Attribute:length+' => '电缆长度，以米为单位',
	'Class:NetworkCable/Attribute:label' => '标签',
	'Class:NetworkCable/Attribute:label+' => '附加到电缆的标签',
	'Class:NetworkCable/Attribute:comment' => '备注',
	'Class:NetworkCable/Attribute:comment+' => '',
));

//
// Class: FrontEndNetworkCable
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:FrontEndNetworkCable' => '前端网络电缆',
	'Class:FrontEndNetworkCable+' => '通过前端连接的两个网络插座之间的电缆',
	'Class:FrontEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id' => '网络插座 #1 - 前端',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_id+' => '电缆连接到的第一个网络插座的前端',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name' => '网络插座 #1 名称',
	'Class:FrontEndNetworkCable/Attribute:networksocket1_name+' => '',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id' => '网络插座 #2 - 前端',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_id+' => '电缆连接到的第二个网络插座的前端',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name' => '网络插座 #2 名称',
	'Class:FrontEndNetworkCable/Attribute:networksocket2_name+' => '',
));

//
// Class: BackEndNetworkCable
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:BackEndNetworkCable' => '后端网络电缆',
	'Class:BackEndNetworkCable+' => '通过后端连接的两个网络插座之间的电缆',
	'Class:BackEndNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id' => '网络插座 #1 - 后端',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_id+' => '电缆连接到的第一个网络插座的后端',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name' => '网络插座 #1 名称',
	'Class:BackEndNetworkCable/Attribute:backendsocket1_name+' => '',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id' => '网络插座 #2 - 后端',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_id+' => '电缆连接到的第二个网络插座的后端',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name' => '网络插座 #2 名称',
	'Class:BackEndNetworkCable/Attribute:backendsocket2_name+' => '',
));

//
// 类：DeviceNetworkCable
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:DeviceNetworkCable' => '设备网络电缆',
	'Class:DeviceNetworkCable+' => '连接网络插座前端到物理接口的电缆',
	'Class:DeviceNetworkCable/Name' => '%1$s <-> %2$s',
	'Class:DeviceNetworkCable/Attribute:networksocket_id' => '网络插座 - 前端',
	'Class:DeviceNetworkCable/Attribute:networksocket_id+' => '电缆连接的网络插座前端',
	'Class:DeviceNetworkCable/Attribute:networksocket_name' => '网络插座名称',
	'Class:DeviceNetworkCable/Attribute:networksocket_name+' => '',
	'Class:DeviceNetworkCable/Attribute:connectableci_id' => '设备',
	'Class:DeviceNetworkCable/Attribute:connectableci_id+' => '连接电缆的物理接口所在的设备',
	'Class:DeviceNetworkCable/Attribute:connectableci_name' => '设备名称',
	'Class:DeviceNetworkCable/Attribute:connectableci_name+' => '',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id' => '物理接口',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_id+' => '电缆连接的物理接口',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name' => '物理接口名称',
	'Class:DeviceNetworkCable/Attribute:physicalinterface_name+' => '',
));

//
// 类：NetworkSocket
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:NetworkSocket' => '网络插座',
	'Class:NetworkSocket+' => '',
	'Class:NetworkSocket:baseinfo' => '基本信息',
	'Class:NetworkSocket:frontendinfo' => '前端信息',
	'Class:NetworkSocket:backendinfo' => '后端信息',
	'Class:NetworkSocket:moreinfo' => '更多信息',
	'Class:NetworkSocket/Attribute:code' => '编码',
	'Class:NetworkSocket/Attribute:code+' => '用于标识插座在其配线架或位置内的代码',
	'Class:NetworkSocket/Attribute:status' => '状态',
	'Class:NetworkSocket/Attribute:status+' => '',
	'Class:NetworkSocket/Attribute:status/Value:active' => '活动',
	'Class:NetworkSocket/Attribute:status/Value:active+' => '',
	'Class:NetworkSocket/Attribute:status/Value:inactive' => '非活动',
	'Class:NetworkSocket/Attribute:status/Value:inactive+' => '',
	'Class:NetworkSocket/Attribute:location_id' => '位置',
	'Class:NetworkSocket/Attribute:location_id+' => '包含配线架和网络插座的机架或托管网络插座的房间的位置',
	'Class:NetworkSocket/Attribute:location_name' => '位置名称',
	'Class:NetworkSocket/Attribute:location_name+' => '',
	'Class:NetworkSocket/Attribute:rack_id' => '机架',
	'Class:NetworkSocket/Attribute:rack_id+' => '包含配线架的机架',
	'Class:NetworkSocket/Attribute:rack_name' => '机架名称',
	'Class:NetworkSocket/Attribute:rack_name+' => '',
	'Class:NetworkSocket/Attribute:patchpanel_id' => '配线架',
	'Class:NetworkSocket/Attribute:patchpanel_id+' => '托管网络插座的配线架',
	'Class:NetworkSocket/Attribute:patchpanel_name' => '配线架名称',
	'Class:NetworkSocket/Attribute:patchpanel_name+' => '',
	'Class:NetworkSocket/Attribute:org_id' => '组织',
	'Class:NetworkSocket/Attribute:org_id+' => '位置所属的组织。它也定义了插座的组织。',
	'Class:NetworkSocket/Attribute:comment' => '备注',
	'Class:NetworkSocket/Attribute:comment+' => '',
	'Class:NetworkSocket/Attribute:connectableci_id' => '设备',
	'Class:NetworkSocket/Attribute:connectableci_id+' => '连接到网络插座的设备。此属性不能同时填写网络插座。',
	'Class:NetworkSocket/Attribute:connectableci_name' => '设备名称',
	'Class:NetworkSocket/Attribute:connectableci_name+' => '',
	'Class:NetworkSocket/Attribute:physicalinterface_id' => '物理接口',
	'Class:NetworkSocket/Attribute:physicalinterface_id+' => '设备通过物理接口连接到网络插座',
	'Class:NetworkSocket/Attribute:physicalinterface_name' => '物理接口名称',
	'Class:NetworkSocket/Attribute:physicalinterface_name+' => '',
	'Class:NetworkSocket/Attribute:networksocket_id' => '网络插座',
	'Class:NetworkSocket/Attribute:networksocket_id+' => '连接到网络插座的远程网络插座。此属性不能同时填写设备。',
	'Class:NetworkSocket/Attribute:networksocket_name' => '网络插座名称',
	'Class:NetworkSocket/Attribute:networksocket_name+' => '',
	'Class:NetworkSocket/Attribute:backendsocket_id' => '后端网络插座',
	'Class:NetworkSocket/Attribute:backendsocket_id+' => '通过后端电缆连接的远程网络插座',
	'Class:NetworkSocket/Tab:cables_list' => '电缆',
	'Class:NetworkSocket/Tab:cables_list+' => '连接到网络插座的所有电缆列表',
));

//
// 类：PatchPanel
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:PatchPanel' => '配线架',
	'Class:PatchPanel+' => '',
	'Class:PatchPanel:baseinfo' => '基本信息',
	'Class:PatchPanel:moreinfo' => '更多信息',
	'Class:PatchPanel:rackinfo' => '机架信息',
	'Class:PatchPanel/Attribute:rack_id' => '机架',
	'Class:PatchPanel/Attribute:rack_id+' => '托管配线架的机架',
	'Class:PatchPanel/Attribute:rack_name' => '机架名称',
	'Class:PatchPanel/Attribute:rack_name+' => '',
	'Class:PatchPanel/Attribute:capacity' => '容量',
	'Class:PatchPanel/Attribute:capacity+' => '面板上的网络插座数量',
	'Class:PatchPanel/Attribute:networksockets_list' => '网络插座',
	'Class:PatchPanel/Attribute:networksockets_list+' => '配线架上所有网络插座的列表',
	'Class:PatchPanel/Tab:cables_list' => '电缆',
	'Class:PatchPanel/Tab:cables_list+' => '连接到配线架上托管的网络插座的所有电缆的列表',
	'Class:PatchPanel/Tab:frontendpanels_list' => '对等前端面板',
	'Class:PatchPanel/Tab:frontendpanels_list+' => '通过其托管插座的网络插座连接到当前配线架的所有配线架的列表',
	'Class:PatchPanel/Tab:backendpanels_list' => '对等后端面板',
	'Class:PatchPanel/Tab:backendpanels_list+' => '通过其托管插座的后端网络插座连接到当前配线架的所有配线架的列表',
));

//
// 类：PhysicalInterface
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:PhysicalInterface/Attribute:networksocket_id' => '网络插座',
	'Class:PhysicalInterface/Attribute:networksocket_id+' => '连接到接口的远程网络插座。此属性不能同时填写远程设备。',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id' => '远程设备',
	'Class:PhysicalInterface/Attribute:remote_connectableci_id+' => '连接到接口的远程设备。此属性不能同时填写网络插座。',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name' => '远程设备名称',
	'Class:PhysicalInterface/Attribute:remote_connectableci_name+' => '',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id' => '远程物理接口',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_id+' => '用于连接的远程设备上的物理接口。',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name' => '远程物理接口名称',
	'Class:PhysicalInterface/Attribute:remote_physicalinterface_name+' => '',
	'Class:PhysicalInterface/Tab:cables_list' => '电缆',
	'Class:PhysicalInterface/Tab:cables_list+' => '连接到接口的所有电缆的列表',
));

//
// 类：Rack
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Class:Rack/Attribute:patchpanels_list' => '配线架',
	'Class:Rack/Attribute:patchpanels_list+' => '托管在机架上的所有配线架的列表',
));

//
// 操作
//


Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'UI:CableManagement:Action:CreateOrUpdate:NetworkCable:Duplicate' => '已经有一根电缆连接相同的网络插座',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToRackButNotToPatchPanel' => '当网络插座属于一个机架时，需要选择一个配线架！',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToDeviceAndSocket' => '一个网络插座不能同时连接到设备接口和另一个网络插座！',
	'UI:CableManagement:Action:CreateOrUpdate:NetworkSocket:PointToBackendAndSocket' => '一个网络插座不能通过网络插座和后端插座连接到相同的远程插座！',
	'UI:CableManagement:Action:CreateOrUpdate:PhysicalInterface:NoDualSocketAndCIAllowed' => '一个物理接口不能同时连接到网络插座和远程设备！',
));

//
// 菜单
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
	'Menu:TeemIpNetworking:Cabling' => '电缆布线',
	'Relation:wiring/Description' => '布线布局',
	'Relation:wiring/DownStream' => '布线...',
	'Relation:wiring/DownStream+' => '布线布局',
	'Relation:wiring/UpStream' => '布线...',
	'Relation:wiring/UpStream+' => '布线布局',
));

