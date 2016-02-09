<?php

/*
 * This file is part of the API Client Bundle.
 *
 * (c) Daniel Kiesel <https://github.com/iCodr8>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$GLOBALS['TL_DCA']['tl_api_client'] = array
(
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
        'onsubmit_callback' => array
        (
            array('Craffft\\ApiClientBundle\\DataContainer\\ApiClient', 'storeDateAdded')
        ),
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary',
                'clientId' => 'unique',
                'clientSecret' => 'unique',
                'currentAccessToken' => 'unique'
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 2,
            'fields'                  => array('name DESC'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;sort,search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('name', 'clientId'),
            'showColumns'             => true
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_api_client']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_api_client']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'toggle' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_api_client']['toggle'],
                'icon'                => 'visible.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback'     => array('Craffft\\ApiClientBundle\\DataContainer\\ApiClient', 'toggleIcon')
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_api_client']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ),

    // Palettes
    'palettes' => array
    (
        '__selector__'                => array('login', 'assignDir'),
        'default'                     => '{name_legend},name;{login_legend},clientId,clientSecret,currentAccessToken,accessTokenExpireDate;{account_legend},disable,start,stop',
    ),


    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'dateAdded' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['MSC']['dateAdded'],
            'sorting'                 => true,
            'flag'                    => 6,
            'eval'                    => array('rgxp'=>'datim'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_api_client']['name'],
            'exclude'                 => true,
            'search'                  => true,
            'sorting'                 => true,
            'flag'                    => 1,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'clientId' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_api_client']['clientId'],
            'exclude'                 => true,
            'search'                  => true,
            'sorting'                 => true,
            'flag'                    => 1,
            'inputType'               => 'text',
            'eval'                    => array('unique'=>true, 'rgxp'=>'extnd', 'nospace'=>true, 'maxlength'=>64),
            'load_callback' => array
            (
                array('Craffft\\ApiClientBundle\\DataContainer\\ApiClient', 'setDefaultClientId')
            ),
            'sql'                     => "varchar(64) NOT NULL default ''"
        ),
        'clientSecret' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_api_client']['clientSecret'],
            'exclude'                 => true,
            'inputType'               => 'textarea',
            'eval'                    => array('rgxp'=>'extnd', 'nospace'=>true, 'preserveTags'=>true, 'minlength'=>32, 'tl_class' => 'long'),
            'load_callback' => array
            (
                array('Craffft\\ApiClientBundle\\DataContainer\\ApiClient', 'setDefaultSecret')
            ),
            'sql'                     => "varchar(128) NOT NULL default ''"
        ),
        'currentAccessToken' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_api_client']['currentAccessToken'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('unique'=>true, 'rgxp'=>'extnd', 'nospace'=>true, 'disabled' => true, 'minlength'=>64, 'tl_class' => 'long'),
            'sql'                     => "varchar(128) NOT NULL default ''"
        ),
        'accessTokenExpireDate' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_api_client']['accessTokenExpireDate'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'disabled' => true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
        ),
        'disable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_api_client']['disable'],
            'exclude'                 => true,
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'sql'                     => "tinyint(1) NOT NULL"
        ),
        'start' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_api_client']['start'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
        ),
        'stop' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_api_client']['stop'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
        )
    )
);
