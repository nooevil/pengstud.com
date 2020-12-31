<?php
/* Для главной страницы */
new WPS_MetaBox(
    array(
        'meta_box_name' => 'Информация',
        'post_types' => array(),
        'page_templates' => array('templates/about_us-en.php'),
        'meta_box_groups' => array(
            // Group fields
            array(
                'title' => 'Информация',
                'fields' => array(
                    array(
                        'field_type'   => 'image',
                        'field_name'   => 'mainScreen',
                        'title'        => 'Фото на первом экране',
                    ),
                    array(
                        'field_type'   => 'simple_gallery',
                        'field_name'   => 'ourTeam',
                        'title'        => 'Наша команда',
                    ),
                    array(
                        'field_type'  => 'repeater',
                        'field_name'  => 'managers',
                        'title'       => 'Менеджеры',
                        'fields'      => array(
                            // поля
                            array(
                                'field_type'  => 'image',
                                'field_name'  => 'image',
                                'title'       => 'Фото',
                            ),
                            array(
                                'field_type'  => 'input',
                                'field_name'  => 'name',
                                'title'       => 'ФИО',
                            ),
                            array(
                                'field_type'  => 'input',
                                'field_name'  => 'position',
                                'title'       => 'Должность',
                            ),
                            array(
                                'field_type'  => 'input',
                                'field_name'  => 'link',
                                'title'       => 'Ссылка на linkedin',
                            ),
                            array(
                                'field_type'  => 'textarea',
                                'field_name'  => 'about',
                                'title'       => 'Описание',
                            ),

                        )
                    ),
                )
            ),
            // Group fields
        )
    )
);

/* для страницы google shopping */
new WPS_MetaBox(
    array(
        'meta_box_name' => 'Информация',
        'post_types' => array(),
        'page_templates' => array('templates/google-shopping-en.php'),
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


/* страница панды */
new WPS_MetaBox(
    array(
        'meta_box_name' => 'Информация',
        'post_types' => array(),
        'page_templates' => array('templates/panda-software-en.php'),
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