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


/* FAQ */
new WPS_CustomType(
  array(
    ## Create Files
    'create_archive_file' => false,
    'create_single_file'  => false,

    ## Post Type Register
    'register_post_type' => array(
      'post_type' => 'faq', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'FAQ',
        'singular_name' => 'FAQ', 
        'menu_name'     => 'FAQ'
      ),
      // supports_label
      'supports_label' => array(
        'title',
        //'thumbnail', 
        'editor',
        'comments'
        //'custom-fields',
      ),
      // rewrite
      'rewrite' => array(
        'slug'         => 'faq', // 2) custom-type slug
        'with_front'   => false,
        'hierarchical' => true
      ),
      // general
      'general' => array(
        // if need remove in query
        //'query_var'           => false, 
        //'publicly_queryable'  => false,
        // 'exclude_from_search' => true,
        'taxonomies'        => array('faq-category'), // 3) 
        'menu_icon'         => 'dashicons-list-view', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),

    ## Create Taxonomy 
    'register_taxonomy' => array(
      // tax
      array (
          'taxonomy_name' => 'faq-category',         // 1)
          'setting' => array(
              'label'             => 'Категория вопроса', // 2)
              'hierarchical'      => true,
              'public'            => true,
              'query_var'         => true,
              'rewrite'           => array(
                  'slug'         => 'faq-category',      // 3)
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

/*
new WPS_MetaBox(
    array(
        'meta_box_name'   => 'Информация',
        'post_types'      => array( 'faq' ),
        'page_templates'  => array( '' ),
        'meta_box_groups' => array(
            array(
                'title'    => 'Информация',
                'fields'   => array(
                    array(
                        'field_type'   => 'input',
                        'field_name'   => 'faq_title',
                        'title'        => 'Название вопроса',
                    ),
                    array(
                        'field_type'   => 'wp_editor',
                        'field_name'   => 'faq_description',
                        'title'        => 'Описание ответа',
                    ),
                )
            ),
        )
    )
);
*/

/*
new WPS_TermFields(
    array(
        'taxonomy'  => array( 'faq-category' ),
        'fields'    => array(
            array(
                'field_type'   => 'image',
                'field_name'   => 'category_image',
                'title'        => 'Изображение категории',
            ),
        )
    )
);
*/
