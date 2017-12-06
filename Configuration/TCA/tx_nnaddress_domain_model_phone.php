<?php
return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_phone',
        'label' => 'type',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,

        'versioningWS' => TRUE,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'searchFields' => 'type,number',
        'iconfile' => 'EXT:nn_address/Resources/Public/Icons/tx_nnaddress_domain_model_phone.png'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, type, number',
    ),
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general, type, number,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, sys_language_uid, l10n_parent, l10n_diffsource, hidden, starttime, endtime'
        ],
    ],
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_nnaddress_domain_model_phone',
                'foreign_table_where' => 'AND tx_nnaddress_domain_model_phone.pid=###CURRENT_PID### AND tx_nnaddress_domain_model_phone.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ]
            ),
        ),
        'endtime' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ]
            ),
        ),
        'type' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_phone.type',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_phone.xlf:type.0', 0),
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_phone.xlf:type.1', 1),
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_phone.xlf:type.2', 2),
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_phone.xlf:type.3', 3),
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_phone.xlf:type.4', 4),
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_phone.xlf:type.5', 5),
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_phone.xlf:type.6', 6),
                ),
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ),
        ),
        'number' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_phone.number',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'person' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
    ),
);
