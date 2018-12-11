<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	<INCLUDE_TYPOSCRIPT: source="FILE:EXT:nn_address/Configuration/TSconfig/default.txt">
');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nnaddress_domain_model_person', 'EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_person.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nnaddress_domain_model_person');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nnaddress_domain_model_address', 'EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_address.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nnaddress_domain_model_address');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nnaddress_domain_model_phone', 'EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_phone.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nnaddress_domain_model_phone');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nnaddress_domain_model_mail', 'EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_mail.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nnaddress_domain_model_mail');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_nnaddress_domain_model_group', 'EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_group.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_nnaddress_domain_model_group');

// Flexform autloader
\NN\NnAddress\Utility\Flexform::flexFormAutoLoader();
