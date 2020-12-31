<?php

/**
 * File for function declaration.
 *
 * @package   WPS_Framework
 * @version   1.0.0
 * @author    Alexander Laznevoy 
 * @copyright Copyright (c) 2017, Alexander Laznevoy
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 *
 */


// wps mail config for SMTP
define( 'WPS__SMTP_HOST',   'mail.adm.tools' ); // The hostname of the mail server
define( 'WPS__SMTP_USER',   'info@pengstud.com' ); // Username to use for SMTP authentication
define( 'WPS__SMTP_PASS',   '906GBbG9sbGv' ); // Password to use for SMTP authentication
define( 'WPS__SMTP_FROM',   'info@pengstud.com' ); // SMTP From email address
define( 'WPS__SMTP_PORT',   '25' );  // SMTP port number - likely to be 25, 465 or 587
define( 'WPS__SMTP_SECURE', 'tls' ); // Encryption system to use - ssl or tls

new WPS_OptionPage(
    array(
        // submenu_setting
        'submenu_setting' => array(
            'submenupos' => "wps_theme_main_settings",
            // если нужно добавить в меню типа записей - 'submenupos' => "edit.php?post_type=custom_post2",
            'page_title' => 'Настройки keywords tool',
            'menu_title' => 'Настройки keywords tool',
            'capability' => 'administrator',
            'menu_slug'  => 'wps_theme_main_settings_sub',
        ),
        // submenu_setting
        'fields'    => array(
            array(
                'field_type'  => 'input',
                'field_name'  => 'yandex_current_account',
                'title'       => 'Номер текущего аккаунта (0-6)',
            ),
            array(
                'field_type'  => 'input',
                'field_name'  => 'yandex_current_limit',
                'title'       => 'Количество запросов осталось',
            ),
        )
    )
);






/* для страницы google shopping */
new WPS_MetaBox(
    array(
        'meta_box_name' => 'Информация',
        'post_types' => array(),
        'page_templates' => array('templates/google-shopping.php'),
        'meta_box_groups' => array(
            // Group fields
            array(
                'title' => 'Информация',
                'fields' => array(
                    array(
                        'field_type'   => 'image',
                        'field_name'   => 'image',
                        'title'        => 'Screenshot Google Ads',
                    ),
                    array(
                        'field_type'   => 'image',
                        'field_name'   => 'screen',
                        'title'        => 'Another screen',
                    ),
                )
            ),
            // Group fields
        )
    )
);

/* для страницы Amazon */
new WPS_MetaBox(
    array(
        'meta_box_name' => 'Информация',
        'post_types' => array(),
        'page_templates' => array('templates/amazon-page.php'),
        'meta_box_groups' => array(
            // Group fields
            array(
                'title' => 'Информация',
                'fields' => array(
                    array(
                        'field_type'   => 'image',
                        'field_name'   => 'rates_banner',
                        'title'        => 'Screenshot Amazon',
                    ),

                )
            ),
            // Group fields
        )
    )
);


/* страница панды */
new WPS_MetaBox(
    array(
        'meta_box_name' => 'Информация',
        'post_types' => array(),
        'page_templates' => array('templates/panda-software.php'),
        'meta_box_groups' => array(
            // Group fields
            array(
                'title' => 'Информация',
                'fields' => array(
                    array(
                        'field_type'   => 'image',
                        'field_name'   => 'image',
                        'title'        => 'Screenshot Google Ads',
                    ),
                )
            ),
            // Group fields
        )
    )
);