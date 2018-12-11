<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'nn_address',
    'Single',
    'Address - Single'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'nn_address',
    'List',
    'Address - List'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'nn_address',
    'AbcList',
    'Address - ABC List'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'nn_address',
    'tx_nnaddress_domain_model_person'
);
