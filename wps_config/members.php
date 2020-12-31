<?php

/*Регистрируем тип записи "пользователь"*/
new WPS_CustomType(
    array(
        ## Create Files
        'create_archive_file' => false,
        'create_single_file'  => false,

        ## Post Type Register
        'register_post_type' => array(
            'post_type' => 'members', // 1) custom-type name
            // labels
            'labels'    => array(
                'name'          => 'Пользователи',
                'singular_name' => 'Пользователи',
                'menu_name'     => 'Пользователи'
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
                'slug'         => 'members', // 2) custom-type slug
                'with_front'   => false,
                'hierarchical' => true
            ),
            // general
            'general' => array(
                // if need remove in query
                'query_var'           => false,
                'publicly_queryable'  => false,
                'exclude_from_search' => true,
                'taxonomies'        => array('role'), // 3)
                'menu_icon'         => 'dashicons-admin-users', // 4) https://developer.wordpress.org/resource/dashicons/
            )
        ),

        ## Create Taxonomy
        'register_taxonomy' => array(
            // tax
            array (
                'taxonomy_name' => 'role',         // 1)
                'setting' => array(
                    'label'             => 'Права', // 2)
                    'hierarchical'      => true,
                    'public'            => true,
                    'query_var'         => false,
                    'publicly_queryable' => false,
                    'rewrite'           => array(
                        'slug'         => 'role',      // 3)
                        'with_front'   => true,
                        'hierarchical' => true
                    ),
                    'show_admin_column' => true,
                    'show_ui'           => true
                )
            ),
        )
    )
);



/*Общие данные об аккаунте*/
new WPS_MetaBox(
    array(
        'meta_box_name'   => 'Общие данные',
        'post_types'      => array( 'members' ),
        'page_templates'  => array( ),
        'meta_box_groups' => array(
            array(
                'title'    => 'Общие данные',
                'fields'   => array(
                    array(
                         'field_type'  => 'input',
                         'field_name'  => 'verify_code',
                         'title'       => 'Код верификации',
                    ),
                    array(
                        'field_type'  => 'checkbox',
                        'field_name'  => 'user_verify',
                        'title'       => 'Статус верификации',
                        'class'       => 'wps_ui_checkbox_css',
                    ),
                )
            ),
        )
    )
);
/*Анкета клиента*/


/*Добавляем личные данные (фио и т.д)*/
new WPS_MetaBox(
    array(
        'meta_box_name'   => 'Данные пользователя',
        'post_types'      => array( 'members' ),
        'page_templates'  => array( ),
        'meta_box_groups' => array(
            array(
                'title'    => 'Контактные данные',
                'fields'   => array(
                    array(
                        'field_type'  => 'input',
                        'field_name'  => 'user_fio',
                        'title'       => 'ФИО',
                    ),
                    array(
                        'field_type'  => 'input',
                        'field_name'  => 'user_email',
                        'type_input'  => 'email',
                        'title'       => 'E-mail',
                    ),
                    array(
                        'field_type'  => 'input',
                        'field_name'  => 'user_phone',
                        'title'       => 'Телефон',
                    ),
                    array(
                        'field_type'  => 'input',
                        'field_name'  => 'user_company',
                        'title'       => 'Компания',
                    ),

                )
            ),
        )
    )
);


new WPS_MetaBox(
    array(
        'meta_box_name'   => 'Действия пользователя',
        'post_types'      => array( 'members' ),
        'page_templates'  => array( ),
        'meta_box_groups' => array(
            array(
                'title'    => '',
                'fields'   => array(
                    array(
                      'field_type'  => 'button',
                      'btn_value'   => 'Просмотреть',
                      'title'       => 'Логи поиска за всё время',
                      'description' => '',
                      // if need ajax
                      'ajax'        => true,
                      'ajax_action' => 'get_user_search_logs',
                      'set_timeout' => 300000
                    ),
                )
            ),
        )
    )
);


new WPS_MetaBox(
    array(
        'meta_box_name'   => 'Тариф пользователя',
        'post_types'      => array( 'members' ),
        'page_templates'  => array( ),
        'meta_box_groups' => array(
            array(
                'title'    => '',
                'fields'   => array(
                    array(
                      'field_type'   => 'input',
                      'field_name'   => 'period_start',
                      'title'        => 'Дата начала',
                      'description'  => 'Дата покупки тарифа',
                      'type_input'   => 'text',
                      'add_class'    => 'fn_date_schedule',
                    ),
                    array(
                      'field_type'   => 'input',
                      'field_name'   => 'period_end',
                      'title'        => 'Дата окончания',
                      'description'  => 'Дата окончания действия тарифа',
                      'type_input'   => 'date',
                    ),
                    array(
                        'field_type'  => 'input',
                        'field_name'  => 'limit',
                        'title'       => 'Количество выборок',
                    ),
                )
            )
        )
    )
);



new WPS_MetaBox(
    array(
        'meta_box_name'   => 'Ручное управление тарифом',
        'post_types'      => array( 'members' ),
        'page_templates'  => array( ),
        'meta_box_groups' => array(
            array(
                'title'    => '',
                'fields'   => array(
                    array(
                      'field_type'   => 'message',
                      'type_message' => 'warning', 
                      'message'      => 'Для смены тарифа: выберите права (тариф), обновите данные записи, нажмите "Обновить".',
                    ),
                    array(
                      'field_type'  => 'button',
                      'btn_value'   => 'Обновить',
                      'title'       => '',
                      'confirm'     => "Вы точно этого хотите?",
                      // if need ajax
                      'ajax'        => true,
                      'ajax_action' => 'user_update_tarif',
                      'set_timeout' => 10000
                    ),
                )
            ),
        )
    )
);




new WPS_PostColumns(
    array(
        'post_type' => 'members',
        'fields'    => array(
            array(
                'field_type'   => 'row_color',
                'field_name'   => 'user_active',
                'columns_name' => 'Row Color',
                'options'      => array(
                    "true" => "rgba(130, 218, 185, 0.3)",
                    "false"   => "rgba(255, 90, 90, 0.1)",
                )
            ),
            array(
                'field_type'   => 'text',
                'field_name'   => 'user_company',
                'columns_name' => 'Компания'
            ),
            array(
                'field_type'   => 'text',
                'field_name'   => 'user_email',
                'columns_name' => 'Email'
            ),
            array(
                'field_type'   => 'text',
                'field_name'   => 'limit',
                'columns_name' => 'Лимит'
            ),
            array(
                'field_type'   => 'checkbox',
                'field_name'   => 'user_verify',
                'columns_name' => 'Верификация'
            ),
        )
    )
);


new WPS_TermFields( 
  array(
    'taxonomy'  => array( 'role' ),
    'fields'    => array(
      // FIELDS
        array(
          'field_type'   => 'input',
          'field_name'   => 'tarif_name',
          'title'        => 'Название тарифа',
          'description'  => 'Название для фронта',
          'required'     => true,
        ),
        array(
          'field_type'   => 'input',
          'field_name'   => 'project_count',
          'title'        => 'Кол-во проектов',
          'description'  => '',
          'type_input'   => 'num',
          'def_value'    => '0',
          'required'     => true,
        ),
        array(
          'field_type'   => 'input',
          'field_name'   => 'search_count',
          'title'        => 'Кол-во поисков',
          'description'  => '',
          'type_input'   => 'num',
          'def_value'    => '0',
          'required'     => true,
        ),
        array(
          'field_type'   => 'input',
          'field_name'   => 'period_length',
          'title'        => 'Длительность (месяцев)',
          'type_input'   => 'num',
          'def_value'    => '0',
          'required'     => true,
        ),
        array(
          'field_type'   => 'input',
          'field_name'   => 'price',
          'title'        => 'Стоимость ($)',
          'description'  => '',
          'type_input'   => 'num',
          'def_value'    => '0',
          'required'     => true,
        ),
        array(
          'field_type'   => 'input',
          'field_name'   => 'price_per_month',
          'title'        => 'Стоимость в месяц ($)',
          'description'  => '',
          'type_input'   => 'num',
          'def_value'    => '0',
          'required'     => true,
        ),
        array(
          'field_type'   => 'input',
          'field_name'   => 'price_saving',
          'title'        => 'Экономия ($)',
          'description'  => 'В месяц, в сравнении с подпиской на 1 месяц',
          'type_input'   => 'num',
          'def_value'    => '0',
          'required'     => true,
        ),
    )
  )
);