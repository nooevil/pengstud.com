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

/* Вакансии */
new WPS_CustomType(
  array(
    ## Create Files
    'create_archive_file' => false,
    'create_single_file'  => false,

    ## Post Type Register
    'register_post_type' => array(
      'post_type' => 'vacancy', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'Вакансии',
        'singular_name' => 'Вакансии', 
        'menu_name'     => 'Вакансии'
      ),
      // supports_label
      'supports_label' => array(
        'title',
        'thumbnail', 
        'editor',
        'comments'
        //'custom-fields',
      ),
      // rewrite
      'rewrite' => array(
        'slug'         => 'vacancy', // 2) custom-type slug
        'with_front'   => false,
        'hierarchical' => true
      ),
      // general
      'general' => array(
        // if need remove in query
        //'query_var'           => false, 
        //'publicly_queryable'  => false,
        //'exclude_from_search' => true,
        'taxonomies'        => array('vacancy_type'), // 3) 
        'menu_icon'         => 'dashicons-forms', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),

    ## Create Taxonomy 
    'register_taxonomy' => array(
      // tax
      array (
        'taxonomy_name' => 'vacancy_type',         // 1) 
        'setting' => array(
          'label'             => 'Категория', // 2) 
          'hierarchical'      => true,
          'public'            => true,
          'query_var'         => true,
          'rewrite'           => array( 
            'slug'         => 'vacancy_type',      // 3)
            'with_front'   => true,
            'hierarchical' => true
          ),
          'show_admin_column' => true, 
          'show_ui'           => true 
        )
      ),
      // tax
    )
 
  )
); 


/* Настройка полей вакансии */
new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Превью вакансии',
    'post_types'      => array( 'vacancy' ),
    'page_templates'  => array( '' ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'textarea',
            'field_name'   => 'short_desc',
            'title'        => 'Короткое описание',
          ),
        )
      ),
      // Group fields
    )
  )
);

/* Настройка категорий */
new WPS_TermFields( 
  array(
    'taxonomy'  => array( 'vacancy_type' ),
    'fields'    => array(
      // FIELDS
      array(
        'field_type'   => 'input',
        'field_name'   => 'color',
        'title'        => 'Цвет карточки',
        'type_input'   => 'color',
      ),
    )
  )
);
