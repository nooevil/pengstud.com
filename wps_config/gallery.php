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
      'post_type' => 'gallery', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'Галерея',
        'singular_name' => 'Галерея', 
        'menu_name'     => 'Галерея'
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
        'slug'         => 'gallery', // 2) custom-type slug
        'with_front'   => false,
        'hierarchical' => true
      ),
      // general
      'general' => array(
        // if need remove in query
        'query_var'           => false, 
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'taxonomies'        => array(), // 3) 
        'menu_icon'         => 'dashicons-images-alt2', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),
 
  )
); 


/* ПОЛЯ ДЛЯ БЛОГА */
new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Фото',
    'post_types'      => array( 'gallery' ),
    'page_templates'  => array( ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'image', 
            'field_name'   => 'gallery_photo',
            'title'        => 'Фото',
            'description'  => '',
          ),
          array(
            'field_type'   => 'input', 
            'field_name'   => 'gallery_link',
            'title'        => 'Cсылка на источник',
            'description'  => '',
          ),
        )
      ),
      // Group fields
    )
  )
);

