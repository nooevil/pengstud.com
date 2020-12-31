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


/* БЛОГ */
new WPS_CustomType(
  array(
    ## Create Files
    'create_archive_file' => false,
    'create_single_file'  => false,

    ## Post Type Register
    'register_post_type' => array(
      'post_type' => 'authors', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'Авторы',
        'singular_name' => 'Авторы', 
        'menu_name'     => 'Авторы'
      ),
      // supports_label
      'supports_label' => array(
        'title',
        // 'thumbnail', 
        // 'editor',
        // 'comments'
        //'custom-fields',
      ),
      // rewrite
      'rewrite' => array(
        'slug'         => 'authors', // 2) custom-type slug
        'with_front'   => false,
        'hierarchical' => true
      ),
      // general
      'general' => array(
        // if need remove in query
        'query_var'           => false, 
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'taxonomies'        => array('author_cat'), // 3) 
        'menu_icon'         => 'dashicons-awards', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),

    ## Create Taxonomy 
    'register_taxonomy' => array(
      // tax
      array (
        'taxonomy_name' => 'author_cat',         // 1) 
        'setting' => array(
          'label'             => 'Категория', // 2) 
          'hierarchical'      => true,
          'public'            => true,
          'query_var'         => true,
          'rewrite'           => array( 
            'slug'         => 'author_cat',      // 3)
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


/* ПОЛЯ ДЛЯ БЛОГА */
new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Превью',
    'post_types'      => array( 'authors' ),
    'page_templates'  => array( ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'image', 
            'field_name'   => 'profile_photo',
            'title'        => 'Фото',
            'description'  => 'Полноразмерное',
          ),
					array(
					  'field_type'   => 'image', 
					  'field_name'   => 'photo',
					  'title'        => 'Фото для блога',
					  'description'  => 'Пропроция 1:1',
					),
          array(
            'field_type'   => 'input', 
            'field_name'   => 'position',
            'title'        => 'Должность',
            'description'  => 'Пример: Designer of Penguin-team',
          ),
          array(
            'field_type'   => 'wp_editor',
            'field_name'   => 'description',
            'title'        => 'Описание',
          ),
        )
      ),
      // Group fields
    )
  )
);
new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Социальные сети',
    'post_types'      => array( 'authors' ),
    'page_templates'  => array( ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'input', 
            'field_name'   => 'social_fb',
            'title'        => 'Facebook',
            'description'  => 'https://www.facebook.com/dennissber',
          ),
          array(
            'field_type'   => 'input', 
            'field_name'   => 'social_inst',
            'title'        => 'Instagram',
            'description'  => '',
          ),
          array(
            'field_type'   => 'input', 
            'field_name'   => 'social_link',
            'title'        => 'Linkedin',
            'description'  => '',
          ),
          array(
            'field_type'   => 'input', 
            'field_name'   => 'social_tw',
            'title'        => 'Twitter',
            'description'  => '',
          ),
          array(
            'field_type'   => 'input', 
            'field_name'   => 'social_bh',
            'title'        => 'Behance',
            'description'  => '',
          ),
        )
      ),
      // Group fields
    )
  )
);


new WPS_PostColumns(
  array(
    'post_type' => 'authors',
    'fields'    => array(
      // views первый
      array(
        'field_type'   => 'image',
        'field_name'   => 'photo',
        'columns_name' => 'Фото'
      ),
    )
  )
);
