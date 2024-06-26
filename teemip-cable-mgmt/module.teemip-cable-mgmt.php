<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

/** @noinspection PhpUnhandledExceptionInspection */
SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-cable-mgmt/1.3.0',
	array(
		// Identification
		//
		'label' => 'TeemIp Cable Management',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'teemip-framework/3.1.4',
			'teemip-ip-mgmt/3.1.2',
			'teemip-config-mgmt-adaptor/3.1.1',
			'teemip-datacenter-mgmt-adaptor/3.1.1',
		),
		'mandatory' => false,
		'visible' => true,
		'installer' => 'CableManagementInstaller',

		// Components
		//
		'datamodel' => array(
			'vendor/autoload.php',
			'src/Controller/CableMgmtController.php',
			'src/Helper/DisplayWiring.php',
			'src/Hook/CableMgmtOtherActions.php',
			'model.teemip-cable-mgmt.php',
		),
		'webservice' => array(
		),
		'data.struct' => array(
		),
		'data.sample' => array(
			'data/data.sample.PatchPanel.xml',
			'data/data.sample.NetworkSocket.xml',
			'data/data.sample.CableType.xml',
			'data/data.sample.CableCategory.xml',
			'data/data.sample.DeviceNetworkCable.xml',
			'data/data.sample.BackEndNetworkCable.xml',
			'data/data.sample.FrontEndNetworkCable.xml',
			'data/data.sample.DirectNetworkCable.xml',
			'data/data.sample.BreakoutCable.xml',
			'data/data.sample.lnkBreakoutCableToPatchPanel.xml',
			'data/data.sample.PhysicalInterface.xml'
		),

		// Documentation
		//
		'doc.manual_setup' => '', // hyperlink to manual setup documentation, if any
		'doc.more_information' => '', // hyperlink to more information, if any 

		// Default settings
		//
		'settings' => array(// Module specific settings go here, if any
		),
	)
);

if (!class_exists('CableManagementInstaller')) {
	// Module installation handler
	//
	class CableManagementInstaller extends ModuleInstallerAPI
	{
		public static function BeforeWritingConfig(Config $oConfiguration)
		{
			// If you want to override/force some configuration values, do it here
			return $oConfiguration;
		}

		/**
		 * Handler called before creating or upgrading the database schema
		 * @param $oConfiguration Config The new configuration of the application
		 * @param $sPreviousVersion string PRevious version number of the module (empty string in case of first install)
		 * @param $sCurrentVersion string Current version number of the module
		 */
		public static function BeforeDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion)
		{
			// If you want to migrate data from one format to another, do it here
		}

		/**
		 * Handler called after the creation/update of the database schema
		 * @param $oConfiguration Config The new configuration of the application
		 * @param $sPreviousVersion string PRevious version number of the module (empty string in case of first install)
		 * @param $sCurrentVersion string Current version number of the module
		 */
		public static function AfterDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion)
		{
			if ($sPreviousVersion == '1.0.0') {
				SetupLog::Info("Module teemip-cable-mgmt: move NetworkCable class to FrontEndNetworkCable");

				$sDBSubname = $oConfiguration->Get('db_subname');
				$sCopy = "INSERT INTO ".$sDBSubname."frontendnetworkcable (id, networksocket1_id, networksocket2_id) SELECT id, networksocket1_id, networksocket2_id FROM ".$sDBSubname."networkcable";
				CMDBSource::Query($sCopy);

				$sCopy = "UPDATE ".$sDBSubname."networkcable SET finalclass = 'FrontEndNetworkCable'";
				CMDBSource::Query($sCopy);

				SetupLog::Info("Module teemip-cable-mgmt: migration done");
			}

			// Load audit category and rules related to the module
			if (version_compare($sPreviousVersion, $sCurrentVersion, '!=')) {
				$oDataLoader = new XMLDataLoader();

				CMDBObject::SetTrackInfo("Initialization");
				$oMyChange = CMDBObject::GetCurrentChange();

				$sLang = null;
				// Try to get app. language from configuration fil (app. upgrade)
				$sConfigFileName = APPCONF.'production/'.ITOP_CONFIG_FILE;
				if (file_exists($sConfigFileName)) {
					$oFileConfig = new Config($sConfigFileName);
					if (is_object($oFileConfig)) {
						$sLang = str_replace(' ', '_', strtolower($oFileConfig->GetDefaultLanguage()));
					}
				}

				// If still no language, get the default one
				if (null === $sLang) {
					$sLang = str_replace(' ', '_', strtolower($oConfiguration->GetDefaultLanguage()));
				}

				$sFileName = dirname(__FILE__)."/data/".$sLang.".data.teemip-cable-mgmt.xml";
				SetupLog::Info("Searching file: $sFileName");
				if (!file_exists($sFileName)) {
					$sFileName = dirname(__FILE__)."/data/en_us.data.teemip-cable-mgmt.xml";
				}
				SetupLog::Info("Loading file: $sFileName");
				$oDataLoader->StartSession($oMyChange);
				$oDataLoader->LoadFile($sFileName, false, true);
				$oDataLoader->EndSession();
			}
		}
	}
}
