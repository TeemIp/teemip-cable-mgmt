<?php
/**
 * @copyright   Copyright (C) 2022 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-bridge-datacenter-view-extended-cable/1.2.0',
	array(
		// Identification
		//
		'label' => 'Links between Molkobain Datacenter view extended and cable management',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'teemip-cable-mgmt/1.3.0',
			'molkobain-datacenter-view-extended/1.8.2||teemip-cable-mgmt/1.3.0',
		),
		'mandatory' => false,
		'visible' => false,
		'auto_select' => 'SetupInfo::ModuleIsSelected("teemip-cable-mgmt") && SetupInfo::ModuleIsSelected("molkobain-datacenter-view")',

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

