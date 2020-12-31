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

// формирование массива авторов
$args = array(
  'post_type'  => 'blog',
  'posts_per_page' => -1,
  'post_status' => 'publish, draft'
);
$blogs = get_posts( $args );
$array_blog = array();
foreach ($blogs as $blog) {
  $array_blog[$blog->ID] = $blog->post_title;
}



new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Скрипты',
    'post_types'      => array( 'custom_post' ),
    'page_templates'  => array( 'templates/scripts_page.php' ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
            array(
              'field_type'  => 'repeater',
              'field_name'  => 'repeater',
              'title'       => 'Скрипты',
              'description' => '',
              'fields'      => array(
                // поля 
                array(
                  'field_type'  => 'image',
                  'field_name'  => 'image',
                  'title'       => 'Изображение',
                  'description' => '',
                ),
                array(
                  'field_type'  => 'input',
                  'field_name'  => 'name',
                  'title'       => 'Название',
                  'description' => '',
                ),
                  array(
                    'field_type'  => 'select',
                    'field_name'  => 'post_id',
                    'title'       => 'Пост из блога',
                    'add_class'   => 'fn_select2',
                    'multiple'    => false,
                    'options'     => $array_blog
                  ),
              )
            ),
        )
      ),
      // Group fields
    )
  )
);