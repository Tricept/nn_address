<?php

namespace NN\NnAddress\Utility;

class Flexform {

    /**
     * Call this function at the end of your ext_tables.php to autoregister the flexforms
     * of the extension to the given plugins.
	 *
	 * @return void
     */
    public static function flexFormAutoLoader() {
        global $TCA, $_EXTKEY;

        $FlexFormPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/FlexForms/';
        $extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);

        $FlexForms = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir($FlexFormPath, 'xml');

        foreach ($FlexForms as $FlexForm) {
			if ( preg_match("/^Model_(.*)$/",$FlexForm) ) continue;
			
            $fileKey = str_replace('.xml', '', $FlexForm);

            $pluginSignature = strtolower($extensionName . '_' . $fileKey);
			
            $TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
            $TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/' . $fileKey . '.xml');
        }
    }
	
	/**
	 * Modifies the TCA Configuration in Configuration/TCA/Person.php to add
	 * the Flexform file or remove the sheet of the field "flexform".
	 *
	 * @param array $TCA
	 * @return void
	 */
	public static function modifyFlexSheet(&$TCA) {
		$_extConfig = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['nn_address']);
		
		if ( $_extConfig['flexForm'] != '' ) {
			$TCA['tx_nnaddress_domain_model_person']['columns']['flexform']['config']['ds']['default'] = 'FILE:'.$_extConfig['flexForm'];
		} else {
			$TCA['tx_nnaddress_domain_model_person']['types']['1']['showitem'] = str_replace('--div--;LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.advanced, flexform,', '', $TCA['tx_nnaddress_domain_model_person']['types']['1']['showitem']);
		}
		
		unset($_extConfig);
	}
}

?>