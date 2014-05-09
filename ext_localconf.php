<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'NN.' . $_EXTKEY,
	'Single',
	array(
		'Person' => 'single',
		
	),
	// non-cacheable actions
	array(
		'Person' => '',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'NN.' . $_EXTKEY,
	'List',
	array(
		'Person' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Person' => '',
		
	)
);

?>