<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('nn_address', 'Configuration/TypoScript/Default', 'NN Address');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('nn_address', 'Configuration/TypoScript/ContentDesigner', 'CD: Address in Page properties');