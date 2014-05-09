<?php
namespace NN\NnAddress\Mvc\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Hendrik Reimers <h.reimers@neonaut.de>, Neonaut GmbH
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package nn_address
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ActionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     * @inject 
     */
    protected $configurationManager;

	/**
	 * initialize the controller
	 *
	 * @return void
	 */
	protected function initializeAction() {
		parent::initializeAction();
		
		// Renders the settings like TypoScript if enabled
		if ( (sizeof($this->settings) > 0) && ($this->settings['enableStdWrap'] == 1) ) {
			$typoScriptService = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Service\\TypoScriptService');
			$settingsAsTypoScriptArray = $typoScriptService->convertPlainArrayToTypoScriptArray($this->settings);
			
			foreach ( $settingsAsTypoScriptArray as $key => $val ) {
				if ( preg_match("/^(.*)\.$/",$key,$m) ) {
					if ( isset($settingsAsTypoScriptArray[$key]) && isset($settingsAsTypoScriptArray[$m[1]]) ) {
						$this->settings[$m[1]] = $this->configurationManager->getContentObject()->cObjGetSingle($settingsAsTypoScriptArray[$m[1]], $settingsAsTypoScriptArray[$key]);
						unset($this->settings[$key]);
					}
				}
			}
		}
		
		// Check the storagePid
		$this->checkStoragePid();
	}
	
	/**
	 * Checks if the startingpoint via flexform is set and overrides the storagePid
	 * if nothing is set, even the storagePid, it uses the current page as storagePid
	 *
	 * @return void
	 */
	protected function checkStoragePid() {
		$extName    = $this->request->getControllerExtensionName();
		$pluginName = $this->request->getPluginName();
		
		$frameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK, $extName, $pluginName);
		
		// Override the storagePid
		if ( !empty($this->settings['startingpoint']) ) {
			$frameworkConfiguration['persistence']['storagePid'] = $this->settings['startingpoint'];
			
			$this->configurationManager->setConfiguration($frameworkConfiguration);
		} elseif ( empty($frameworkConfiguration['persistence']['storagePid']) ) {
			$frameworkConfiguration['persistence']['storagePid'] = $GLOBALS['TSFE']->id;
			
			$this->configurationManager->setConfiguration($frameworkConfiguration);
		}
	}
	
	/**
	 * Change the default order, the order values could came from typoscript or flexforms
	 *
	 * @param $repository
	 * @param \string $defaultOrderField
	 * @return void
	 */
	protected function setOrderings(&$repository, $defaultOrderField) {
		$order = ( strtoupper($this->settings['order']) == 'DESC' ) ? \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING : \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING;
		
		if ( !empty($this->settings['orderBy']) ) {
			$repository->setDefaultOrderings(array(
				$this->settings['orderBy'] => $order
			));
		} else {
			$repository->setDefaultOrderings(array(
				$defaultOrderField => $order
			));
		}
	}

}
?>