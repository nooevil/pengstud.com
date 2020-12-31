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


new WPS_CustomType(
  array(
    ## Create Files
    'create_archive_file' => false,
    'create_single_file'  => false,

    ## Post Type Register
    'register_post_type' => array(
      'post_type' => 'dispatch_email', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'Запрос на рассылку',
        'singular_name' => 'Запрос на рассылку', 
        'menu_name'     => 'Запрос на рассылку'
      ),
      // supports_label
      'supports_label' => array(
        'title',
        //'thumbnail', 
        //'editor',
        //'custom-fields',
      ),
      // rewrite
      'rewrite' => array(
        'slug'         => 'dispatch_email', // 2) custom-type slug
        'with_front'   => false,
        'hierarchical' => true
      ),
      // general
      'general' => array(
        // if need remove in query
        'query_var'           => false, 
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'taxonomies'        => array(''), // 3) 
        'menu_icon'         => 'dashicons-share-alt2', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),

  )
);


new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Информация',
    'post_types'      => array( 'dispatch_email' ),
    'page_templates'  => array( '' ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'input',
            'field_name'   => 'user_fio',
            'title'        => 'ФИО',
            'type_input'   => 'text'
          ),

          array(
            'field_type'   => 'input',
            'field_name'   => 'user_company',
            'title'        => 'Компания',
            'type_input'   => 'text'
          ),

          array(
            'field_type'   => 'input',
            'field_name'   => 'user_position',
            'title'        => 'Должность',
            'type_input'   => 'text'
          ),

          array(
            'field_type'   => 'input',
            'field_name'   => 'user_country',
            'title'        => 'Страна',
            'type_input'   => 'text'
          ),

          array(
            'field_type'   => 'input',
            'field_name'   => 'user_phone',
            'title'        => 'Телефон',
            'type_input'   => 'text'
          ),

          array(
            'field_type'   => 'input',
            'field_name'   => 'user_email',
            'title'        => 'Email',
            'type_input'   => 'email'
          ),
        )
      ),
      // Group fields
    )
  )
);