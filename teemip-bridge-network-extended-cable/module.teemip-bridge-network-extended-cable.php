<?php
/**
 * @copyright   Copyright (C) 2022 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-bridge-network-extended-cable/1.0.0',
	array(
		// Identification
		//
		'label' => 'Links between network extended management and cable management',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'teemip-network-mgmt-extended/3.0.1',
			'teemip-cable-mgmt/1.0.0',
		),
		'mandatory' => false,
		'visible' => false,
		'auto_select' => 'SetupInfo::ModuleIsSelected("teemip-network-mgmt-extended") && SetupInfo::ModuleIsSelected("teemip-cable-mgmt")',

		// Components
		//
		'datamodel' => array(
			'model.teemip-bridge-network-extended-cable.php', // Contains the PHP code generated by the "compilation" of datamodel.teemip-cable-mgmt.xml
		),
		'data.struct' => array(//'data.struct.itop-change-mgmt.xml',
		),
		'data.sample' => array(//'data.sample.itop-change-mgmt.xml',
		),

		// Documentation
		//
		'doc.manual_setup' => '',
		'doc.more_information' => '',

		// Default settings
		//
		'settings' => array(),
	)
);

