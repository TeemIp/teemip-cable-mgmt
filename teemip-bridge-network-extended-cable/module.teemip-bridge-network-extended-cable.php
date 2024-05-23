<?php
/**
 * @copyright   Copyright (C) 2022 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-bridge-network-extended-cable/1.1.1',
	array(
		// Identification
		//
		'label' => 'Links between network extended management and cable management',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'teemip-cable-mgmt/1.3.0',
			'teemip-network-mgmt-extended/3.1.0||teemip-cable-mgmt/1.3.0',
		),
		'mandatory' => false,
		'visible' => false,
		'auto_select' => 'SetupInfo::ModuleIsSelected("teemip-cable-mgmt") && SetupInfo::ModuleIsSelected("teemip-network-mgmt-extended")',

		// Components
		//
		'datamodel' => array(
		),
		'data.struct' => array(
		),
		'data.sample' => array(
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

