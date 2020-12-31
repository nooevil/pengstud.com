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
      'post_type' => 'blog', // 1) custom-type name
      // labels
      'labels'    => array(
        'name'          => 'Блог',
        'singular_name' => 'Блог', 
        'menu_name'     => 'Блог'
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
        'slug'         => 'blog', // 2) custom-type slug
        'with_front'   => false,
        'hierarchical' => true
      ),
      // general
      'general' => array(
        // if need remove in query
        //'query_var'           => false, 
        //'publicly_queryable'  => false,
        //'exclude_from_search' => true,
        'taxonomies'        => array('topic'), // 3) 
        'menu_icon'         => 'dashicons-welcome-write-blog', // 4) https://developer.wordpress.org/resource/dashicons/
      )
    ),

    ## Create Taxonomy 
    'register_taxonomy' => array(
      // tax
      array (
        'taxonomy_name' => 'topic',         // 1) 
        'setting' => array(
          'label'             => 'Категория', // 2) 
          'hierarchical'      => true,
          'public'            => true,
          'query_var'         => true,
          'rewrite'           => array( 
            'slug'         => 'topic',      // 3)
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


// формирование массива авторов
$args = array(
  'post_type'  => 'authors',
  'posts_per_page' => -1
);
$authors = get_posts( $args );
$array_authors = array();
foreach ($authors as $author) {
  $array_authors[$author->ID] = $author->post_title;
}



/* ПОЛЯ ДЛЯ БЛОГА */
new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Превью',
    'post_types'      => array( 'blog' ),
    'page_templates'  => array( ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
					array(
					  'field_type'   => 'image', 
					  'field_name'   => 'preview_image',
					  'title'        => 'Изображение',
					  'description'  => 'Рекомендуемый размер [1600х800]',
					),
          array(
            'field_type'  => 'select',
            'field_name'  => 'author_post__cart',
            'title'       => 'Автор поста',
            'add_class'   => 'fn_select2',
            'multiple'    => false,
            'options'     => $array_authors
          ),
          /*
          array(
            'field_type'  => 'select',
            'field_name'  => 'author_post',
            'title'       => 'Автор поста',
            'multiple'    => false,
            'options'     => array(
              'Николай Скоропадский' => 'Николай Скоропадский',
              'Penguin-team' => 'Penguin-team',
              'Березкин Денис' => 'Березкин Денис',
              'Александр Михайленко' => 'Александр Михайленко',
              'Евгений Дорошкевич' => 'Евгений Дорошкевич',
              'Александр Лазневой' => 'Александр Лазневой',
              'Марина Усенко' => 'Марина Усенко',
              'Алёна Лихтер' => 'Алёна Лихтер'
            )
          ),
          */
          array(
            'field_type'   => 'input', 
            'field_name'   => 'read_time',
            'title'        => 'Время для чтения',
            'description'  => 'Пример: 13 минут',
          ),
          array(
            'field_type'   => 'input', 
            'field_name'   => 'complexity_post',
            'type_input'   => 'number',
            'title'        => 'Сложность статьи',
            'description'  => 'Число от 1 до 3',
          ),
          array(
            'field_type'   => 'textarea',
            'field_name'   => 'short_description',
            'title'        => 'Короткое описание',
          ),
        )
      ),
      // Group fields
    )
  )
);


/* ПОЛЯ ДЛЯ БЛОГА */
new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Описание скрипта (только для скриптов)',
    'post_types'      => array( 'blog' ),
    'page_templates'  => array( '' ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'wp_editor',
            'field_name'   => 'script_visible_editor',
            'title'        => 'Описание, которое видят все',
            'description'  => '',
          ),
        )
      ),
      // Group fields
    )
  )
);



new WPS_MetaBox(
    array(
        'meta_box_name' => 'Данные для кейсов',
        'post_types' => array('blog'),
        'page_templates' => array(),
        'meta_box_groups' => array(
            // Group fields
            array(
                'title' => '',
                'fields' => array(
                    // FIELDS
                    array(
                      'field_type'   => 'checkbox',
                      'field_name'   => 'showCase',
                      'title'        => 'Показывать кейс?',
                    ),
                    array(
                        'field_type' => 'input',
                        'field_name' => 'caseName',
                        'title' => 'Имя кейса',
                        'description' => 'example: Кейс для shopping',
                    ),
                    array(
                        'field_type' => 'input',
                        'field_name' => 'beforeWork',
                        'title' => 'before work',
                        'description' => 'example: 10.01.17-12.31.2017',
                    ),
                    array(
                        'field_type' => 'input',
                        'field_name' => 'afterWork',
                        'title' => 'After work',
                        'description' => 'example: 10.01.17-12.31.2017',
                    ),

                    array(
                        'field_type' => 'input',
                        'field_name' => 'beforeROAS',
                        'title' => 'before ROAS',
                        'description' => 'example: 100%',
                    ),
                    array(
                        'field_type' => 'input',
                        'field_name' => 'afterROAS',
                        'title' => 'after ROAS',
                        'description' => 'example: 150%',
                    ),

                    array(
                        'field_type' => 'input',
                        'field_name' => 'beforeConversion',
                        'title' => 'before Conversion',
                        'description' => 'example: 1.5',
                    ),
                    array(
                        'field_type' => 'input',
                        'field_name' => 'afterConversion',
                        'title' => 'after Conversion',
                        'description' => 'example: 2.5%',
                    ),

                    array(
                        'field_type' => 'input',
                        'field_name' => 'beforeROMI',
                        'title' => 'before ROMI',
                        'description' => 'example: -50%',
                    ),
                    array(
                        'field_type' => 'input',
                        'field_name' => 'afterROMI',
                        'title' => 'after ROMI',
                        'description' => 'example: +50%',
                    ),

                    array(
                        'field_type' => 'input',
                        'field_name' => 'beforeNetProfit',
                        'title' => 'before NetProfit',
                        'description' => 'example: -2000$',
                    ),
                    array(
                        'field_type' => 'input',
                        'field_name' => 'afterNetProfit',
                        'title' => 'after NetProfit',
                        'description' => 'example: +5$',
                    ),
                    array(
                        'field_type' => 'image',
                        'field_name' => 'icon',
                        'title' => 'Иконка для кейса ( не активное состояние)',
                    ),
                    array(
                        'field_type' => 'image',
                        'field_name' => 'iconActive',
                        'title' => 'Иконка для кейса (активное состояние)',
                    ),
                )
            ),
            // Group fields
        )
    )
);



new WPS_PostColumns(
  array(
    'post_type' => 'blog',
    'fields'    => array(
      array(
        'field_type'   => 'views',
        'columns_name' => 'Просмотры'
      ),
      array(
        'field_type'   => 'text',
        'field_name'   => 'wps__count__likes',
        'columns_name' => 'Лайки'
      ),
    )
  )
);


// filter
function blog_filter(){
  if ( $_GET['sort_by'] != "" ){

    global $wp_query;

    $args_common = array(
      'order'          => 'DESC',
    );

    $args = array();

    // сортировка дата
    if ( $_GET['sort_by'] == 'date' ) {
      $args = array(
       'orderby'   => 'date',
      );
    }

    // сортировка по популярности
    if ( $_GET['sort_by'] == 'popular' ) {
      $args = array(
        "orderby"  => "meta_value_num",
        "meta_key" => "wps__count__likes",
      );
    }

    // сортировка по просмотрам
    if ( $_GET['sort_by'] == 'views' ) {
      $args = array(
        "orderby"  => "meta_value_num",
        "meta_key" => "wps_post_views_count",
      );
    }

    query_posts(array_merge($args_common, $args, $wp_query->query) );
  }
}