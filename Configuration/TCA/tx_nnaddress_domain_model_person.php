<?php
return array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person',
        'label' => 'last_name',
        'label_alt' => 'first_name,organisation',
        'label_alt_force' => 1,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,

        'versioningWS'  => TRUE,
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
        'searchFields' => 'gender,title,first_name,second_first_name,last_name,organisation,position,birthday,image,street,number,zip,city,phone,fax,email,website,notes,addresses,phones,mails,groups,categories,',
        'iconfile' => 'EXT:nn_address/Resources/Public/Icons/tx_nnaddress_domain_model_person.png'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, gender, title, first_name, second_first_name, last_name, organisation, birthday, image, website, notes, addresses, phones, mails, groups, categories, flexform',
    ),
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,  gender, title, first_name, second_first_name, last_name, organisation, birthday, image, website, notes,
                --div--;LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.addresses, addresses, 
                --div--;LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.phones, phones,
                --div--;LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.mails, mails, 
                --div--;LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.assignment, groups, categories,
                --div--;LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.advanced, flexform,
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
                'foreign_table' => 'tx_nnaddress_domain_model_person',
                'foreign_table_where' => 'AND tx_nnaddress_domain_model_person.pid=###CURRENT_PID### AND tx_nnaddress_domain_model_person.sys_language_uid IN (-1,0)',
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
        'gender' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.gender',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_person.xlf:gender.0', 0),
                    array('LLL:EXT:nn_address/Resources/Private/Language/locallang_csh_tx_nnaddress_domain_model_person.xlf:gender.1', 1),
                ),
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ),
        ),
        'title' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.title',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'first_name' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.first_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'second_first_name' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.second_first_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'last_name' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.last_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'organisation' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.organisation',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'birthday' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.birthday',
            'config' => array(
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'checkbox' => 1,
                'default' => time()
            ),
        ),
        'image' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                [
                    'maxitems' => 99,
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
                        'showPossibleLocalizationRecords' => true,
                        'showRemovedLocalizationRecords' => true,
                        'showAllLocalizationLink' => true,
                        'showSynchronizationLink' => true
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                            --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                            --palette--;;filePalette'
                            ],
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ),
        'website' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.website',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'notes' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.notes',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
            ],
        ),
        'addresses' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.addresses',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_nnaddress_domain_model_address',
                'foreign_field' => 'person',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
                'appearance' => array(
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'useSortable' => 1
                ),
            ),
        ),
        'phones' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.phones',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_nnaddress_domain_model_phone',
                'foreign_field' => 'person',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
                'appearance' => array(
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'useSortable' => 1
                ),
            ),
        ),
        'mails' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.mails',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_nnaddress_domain_model_mail',
                'foreign_field' => 'person',
                'foreign_sortby' => 'sorting',
                'maxitems' => 9999,
                'appearance' => array(
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'useSortable' => 1
                ),
            ),
        ),
        'groups' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:nn_address/Resources/Private/Language/locallang_db.xlf:tx_nnaddress_domain_model_person.groups',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_nnaddress_domain_model_group',
                'foreign_table_where' => ' AND (((\'###PAGE_TSCONFIG_IDLIST###\' <> \'\' OR \'###PAGE_TSCONFIG_IDLIST###\' > 0) AND FIND_IN_SET(tx_nnaddress_domain_model_group.pid,\'###PAGE_TSCONFIG_IDLIST###\')) OR (\'###PAGE_TSCONFIG_IDLIST###\' = \'\' OR \'###PAGE_TSCONFIG_IDLIST###\' = 0)) AND tx_nnaddress_domain_model_group.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_nnaddress_domain_model_group.title ',
                'MM' => 'tx_nnaddress_person_group_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
            ),
        ),
    ),
);
