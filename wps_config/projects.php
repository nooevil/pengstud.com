<?php
new WPS_CustomType(
    array(
        ## Create Files
        'create_archive_file' => false,
        'create_single_file'  => false,

        ## Post Type Register
        'register_post_type' => array(
            'post_type' => 'project', // 1) custom-type name
            // labels
            'labels'    => array(
                'name'          => 'Проекты',
                'singular_name' => 'Проекты',
                'menu_name'     => 'Проекты'
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
                'slug'         => 'project', // 2) custom-type slug
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
                'menu_icon'         => 'dashicons-layout', // 4) https://developer.wordpress.org/resource/dashicons/
            )
        ),
    )
);

new WPS_MetaBox(
    array(
        'meta_box_name'   => 'Информация о проекте',
        'post_types'      => array( 'project' ),
        'page_templates'  => array(  ),
        'meta_box_groups' => array(
            // Group fields
            array(
                'title'    => 'Информация о пользователе',
                'fields'   => array(
                    array (
                        'field_type'   => 'input',
                        'field_name'   => 'user_id',
                        'title'        => 'ID пользователя',
                    ),
                    array (
                        'field_type'   => 'input',
                        'field_name'   => 'user_name',
                        'title'        => 'ФИО',
                    ),
                    array (
                        'field_type'   => 'input',
                        'field_name'   => 'user_ip',
                        'title'        => 'IP с которого был совершен запрос',
                    ),
                )
            ),
            array(
                'title'    => 'Настройки проекта',
                'fields'   => array(
                    array (
                        'field_type'   => 'input',
                        'field_name'   => 'language',
                        'title'        => 'Язык',
                    ),
                    array (
                        'field_type'   => 'input',
                        'field_name'   => 'currency',
                        'title'        => 'Валюта',
                    ),
                    array (
                        'field_type'   => 'input',
                        'field_name'   => 'country',
                        'title'        => 'Страна',
                    ),
                    array (
                        'field_type'   => 'input',
                        'field_name'   => 'cities',
                        'title'        => 'Города (области)',
                    ),
                    array (
                        'field_type'   => 'textarea',
                        'field_name'   => 'keywords',
                        'title'        => 'Ключевые слова',
                    ),
                    array (
                        'field_type'   => 'textarea',
                        'field_name'   => 'excluded_keywords',
                        'title'        => 'Минус слова',
                    ),
                )
            ),
            array(
                'title'    => 'Информация о проекте',
                'fields'   => array(
                    array (
                        'field_type'   => 'textarea',
                        'field_name'   => 'keywords_table',
                        'title'        => 'Результат запроса',
                    ),
                    array (
                        'field_type'   => 'textarea',
                        'field_name'   => 'keywords_groups',
                        'title'        => 'Группы ключевых слов',
                    ),
                )
            ),
            // Group fields
        )
    )
);





