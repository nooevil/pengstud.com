<?php
session_start();
define('SENDUPULSE_ID', '1b5bf8e274a720ae95adce786919ce6c');
define('SENDUPULSE_SECRET', '89f04a685f908b36168dad945c861e17');
define('SENDUPULSE_BOOK_TOOLS', '820290');
define('SENDUPULSE_BOOK_7DAYS', '442878');
// Load the WPS Framework.
require_once(trailingslashit(get_template_directory()) . 'wps_framework/wps-framework.php');
new WPS_Framework();
add_action ('wp_ajax_users_poll_action', 'keep_users_poll_answer');
add_action ('wp_ajax_nopriv_users_poll_action', 'keep_users_poll_answer');
function keep_users_poll_answer() {
    if(isset($_POST['text'])) {
        $text = trim($_POST['text']);
        global $wpdb;
        //$wpdb->show_errors();
        if ($wpdb->insert('wp_polls', ['text' => $text]) == false) {
            echo 'Ошибка, нет данных: ' . $text;
            //$wpdb->print_error();
        } else {
            echo 'Database inssertion successfull';
        }
    }
}
// Sets up theme defaults and registers support for various WordPress features.
add_action('after_setup_theme', 'wps__theme_setup');
function wps__theme_setup()
{
    // Load the congif files.
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/wps_config.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/blog.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/gallery.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/blog_authors.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/members.php');
    //require_once(trailingslashit(CHILD_DIR) . 'wps_config/projects.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/subscribe_email.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/blog_subscribe_email.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/conference_email.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/dispatch_email.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/faq.php');

    require_once(trailingslashit(CHILD_DIR) . 'wps_config/scripts_page.php');

    //en
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/pageOptions.php');
    require_once(trailingslashit(CHILD_DIR) . 'wps_config/authors.php');

    require_once(trailingslashit(CHILD_DIR) . 'wps_config/vacancy.php');
}


// add theme extends
add_action('after_setup_theme', 'theme_extends');
function theme_extends()
{
    // theme_ajax
    require_once(trailingslashit(CHILD_DIR) . 'extends/theme_ajax/init.php');
    // check_list_to_pdf
    require_once(trailingslashit(CHILD_DIR) . 'extends/check_list_to_pdf/init.php');
    // members
    require_once(trailingslashit(CHILD_DIR) . 'extends/members/register.php');
    require_once(trailingslashit(CHILD_DIR) . 'extends/members/auth.php');
    require_once(trailingslashit(CHILD_DIR) . 'extends/members/user.php');
    // subscribe_email
    require_once(trailingslashit(CHILD_DIR) . 'extends/subscribe_email/init.php');
    //excel work
    require_once(trailingslashit(CHILD_DIR) . 'extends/excel/excel.php');
    // user logs
    require_once(trailingslashit(CHILD_DIR) . 'extends/user_log/init.php');
    require_once(trailingslashit(CHILD_DIR) . 'extends/payment/Payment.php');
    //dispatch_email
    require_once(trailingslashit(CHILD_DIR) . 'extends/dispatch_email/init_dispatch.php');






#### Add image size // plugin Force Regenerate Thumbnails
    if (function_exists('add_image_size')) {
        add_image_size('300_300', 300, 300, true); // true/false жесткая обрезка
        add_image_size('340_340', 340, 340, true); // true/false жесткая обрезка
        add_image_size('480_340', 480, 340, true); // true/false жесткая обрезка
        add_image_size('600_350', 600, 350, true); // true/false жесткая обрезка
        add_image_size('1200_600', 1200, 600, true); // true/false жесткая обрезка
        add_image_size('1600_800', 1600, 800, false); // true/false жесткая обрезка
        add_image_size('480_630', 480, 630, true); // true/false жесткая обрезка
        add_image_size('1200_700', 1200, 700, false); // true/false жесткая обрезка
        add_image_size('445_220', 445, 220, true); // true/false жесткая обрезка
        add_image_size('640_480', 640, 480, true); // true/false жесткая обрезка
        add_image_size('50_50', 50, 50, true); // true/false жесткая обрезка
    }
#### Allow the following image size
    add_filter('intermediate_image_sizes', 'true_supported_image_sizes');
    function true_supported_image_sizes($sizes)
    {
        return array(
            '150_150', // не удалять
            '480_340',
            '600_350',
            '1200_600',
            '300_300',
            '340_340',
            '1200_700', // не удалять
            '445_220', // не удалять
            '640_480', // не удалять
            '50_50', // не удалять
        );
    }

#### Path
    define('REL_ASSETS_URI', 'wp-content/themes/' . get_stylesheet() . '/assets/'); // for IMG in frontend
    define('ABS_ASSETS_URI', get_stylesheet_directory_uri() . '/assets');         // for JS and CSS
    define('ABS_THEME_URI', get_stylesheet_directory_uri());         // for JS and CSS

#### Подключение скриптов и стилей https://truemisha.ru/blog/wordpress/wp_enqueue_script.html
## Условные теги http://wp-kama.ru/id_89/uslovnyie-tegi-v-wordpress-i-vse-chto-s-nimi-svyazano.html
    add_action('wp_enqueue_scripts', 'set_scripts_and_styles');
    function set_scripts_and_styles()
    {
        if (!is_admin()) {

            $VERSION = "2.1.3";
            //date('U')

            ## jQuery
            wp_deregister_script('jquery');
            //wp_register_script  ( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, null, true );
            wp_register_script('jquery', ABS_ASSETS_URI . '/js/jquery-3.2.1.min.js', false, null, false);

            ## register script and styles
            wp_register_style('main_style', ABS_ASSETS_URI . '/css/style.css', array(), $VERSION, null);
            wp_register_script('common-js', ABS_ASSETS_URI . '/js/common.js', array('jquery'), $VERSION, true);

            wp_register_script('maskedinput', ABS_ASSETS_URI . '/libs/maskedinput/jquery.maskedinput.min.js', array('jquery'), '1.0.0', true);

            // bootstrap
            wp_register_style('grid', ABS_ASSETS_URI . '/libs/bootstrap/grid.css', array(), '1.0.0', null);

            // slick_slider
            wp_register_style('slick_slider', ABS_ASSETS_URI . '/libs/slick_slider/slick/slick.css', array(), '1.0.0', null);
            wp_register_script('slick_slider', ABS_ASSETS_URI . '/libs/slick_slider/slick/slick.min.js', array('jquery'), '1.0.0', true);

            // aos
            wp_register_style('aos', ABS_ASSETS_URI . '/libs/aos/aos.css', array(), '1.0.0', null);
            wp_register_script('aos', ABS_ASSETS_URI . '/libs/aos/aos.js', array('jquery'), '1.0.0', true);

            // fancybox
            wp_register_style('fancybox', ABS_ASSETS_URI . '/libs/fancybox/css/jquery.fancybox.min.css', array(), '1.0.0', null);
            wp_register_script('fancybox', ABS_ASSETS_URI . '/libs/fancybox/js/jquery.fancybox.js"', array('jquery'), '1.0.0', true);

            // wow
            wp_register_style('animate', ABS_ASSETS_URI . '/libs/animate/animate.css', array(), '1.0.0', null);
            wp_register_script('wow', ABS_ASSETS_URI . '/libs/wow/wow.min.js"', array('jquery'), '1.0.0', true);

            // codemirror
            wp_register_style('codemirror', ABS_ASSETS_URI . '/libs/codemirror/lib/codemirror.css', array(), '1.0.0', null);
            wp_register_style('codemirror_theme', ABS_ASSETS_URI . '/libs/codemirror/theme/monokai.css', array(), '1.0.0', null);
            wp_register_script('codemirror', ABS_ASSETS_URI . '/libs/codemirror/lib/codemirror.js', array('jquery'), '1.0.0', true);
            wp_register_script('codemirror_js', ABS_ASSETS_URI . '/libs/codemirror/mode/javascript/javascript.js', array('jquery'), '1.0.0', true);
            wp_register_script('codemirror_css', ABS_ASSETS_URI . '/libs/codemirror/mode/css/css.js', array('jquery'), '1.0.0', true);
            wp_register_script('codemirror_html', ABS_ASSETS_URI . '/libs/codemirror/mode/htmlmixed/htmlmixed.js', array('jquery'), '1.0.0', true);

            //select2
            wp_register_style('select2_css', ABS_ASSETS_URI . '/libs/select2/select2.min.css', array(), '1.0.0', null);
            wp_register_script('select2_js', ABS_ASSETS_URI . '/libs/select2/select2.min.js', array('jquery'), '1.0.0', true);

            // simplemodal
            wp_register_style('simplemodal', ABS_ASSETS_URI . '/libs/simplemodal/simple_modal.css', array(), '1.0.0', null);
            wp_register_script('simplemodal', ABS_ASSETS_URI . '/libs/simplemodal/simple_modal.js', array('jquery'), '1.0.0', true);

            //toastr
            wp_register_style('toastr', ABS_ASSETS_URI . '/libs/toastr/toastr.min.css', array(), '1.0.0', null);
            wp_register_script('toastr', ABS_ASSETS_URI . '/libs/toastr/toastr.min.js', array('jquery'), '1.0.0', true);

            //highcharts
            wp_register_style('charts', ABS_ASSETS_URI . '/libs/highcharts/css/highcharts.css', array(), '1.0.0', null);
            wp_register_script('charts_js', ABS_ASSETS_URI . '/libs/highcharts/js/highcharts.js', array('jquery'), '1.0.0', true);
            //wp_register_script('charts_js_theme', ABS_ASSETS_URI . '/libs/highcharts/js/themes/dark-unica.js', array('jquery'), '1.0.0', true);
            wp_register_script('charts_js_ex', ABS_ASSETS_URI . '/libs/highcharts/js/modules/exporting.js', array('jquery'), '1.0.0', true);

            // list js
            wp_register_script('list_js', ABS_ASSETS_URI . '/libs/list_js/list.min.js', array('jquery'), '1.0.0', true);

            // kwt
            wp_register_script('kwt-common-js', ABS_ASSETS_URI . '/js/kwt_common.js', array('jquery'), $VERSION, true);
            wp_register_style('kwt_style', ABS_ASSETS_URI . '/css/kwt_style.css', array(), $VERSION, null);

            // lk
            wp_register_script('lk-common-js', ABS_ASSETS_URI . '/js/lk_common.js', array('jquery'), $VERSION , true);
            wp_register_style('lk_style', ABS_ASSETS_URI . '/css/lk_style.css', array(), $VERSION, null);

            // career styles
            wp_register_style('career_style', ABS_ASSETS_URI . '/css/career.css', array(), $VERSION, null);

            //utm
            wp_register_style('utm_style', ABS_ASSETS_URI . '/css/utm_style.css', array(), $VERSION, null);

            //amazon
            wp_register_style('amazon-page', ABS_ASSETS_URI . '/css/amazon-page.css', array(), $VERSION, null);

            //multijs
            wp_register_style('multijs_css', ABS_ASSETS_URI . '/libs/multijs/multi.min.css', array(), '1.0.0', null);
            wp_register_script('multijs', ABS_ASSETS_URI . '/libs/multijs/multi.min.js', array('jquery'), '1.0.1', true);

            //intl-tel
            wp_register_script('intltel_js', ABS_ASSETS_URI . '/libs/intl-tel/js/intlTelInput.js', array('jquery'), '1.0.1', true);
            wp_register_style('intltel_css', ABS_ASSETS_URI . '/libs/intl-tel/css/intlTelInput.css', array(), '1.0.0', null);
            wp_register_style('intltel_demo_css', ABS_ASSETS_URI . '/libs/intl-tel/css/demo.css', array(), '1.0.0', null);
            //wp_register_script('intltel_js_utils', ABS_ASSETS_URI . '/libs/intl-tel/js/utils.js', array('jquery'), '1.0.1', true);

            //angular utm generator
            wp_register_style('style_angular', ABS_ASSETS_URI . '/tools/utm/styles.8b34770882fab2990c4a.bundle.css', array(), null, null);
            wp_register_script('inline_angular', ABS_ASSETS_URI . '/tools/utm/inline.318b50c57b4eba3d437b.bundle.js', array(), null, true);
            wp_register_script('polyfill_angular', ABS_ASSETS_URI . '/tools/utm/polyfills.bf95165a1d5098766b92.bundle.js', array(), null, true);
            wp_register_script('main_angular', ABS_ASSETS_URI . '/tools/utm/main.23b107cad1c2ee43bcac.bundle.js', array(), null, true);

            //wp_register_style ( 'name', ABS_ASSETS_URI.'/css/', array(), '1.0.0', null );
            //wp_register_script( 'name', ABS_ASSETS_URI.'/js/', array('jquery'), '1.0.0', true );

            ## init
            //wp_enqueue_style ( 'name' );
            //wp_enqueue_script( 'name' );


            wp_enqueue_style('slick_slider');
            wp_enqueue_script('slick_slider');

            wp_enqueue_style('simplemodal');
            wp_enqueue_script('simplemodal');

            wp_enqueue_style('fancybox');
            wp_enqueue_script('fancybox');

            wp_enqueue_style('animate');
            wp_enqueue_script('wow');

            wp_enqueue_style('aos');
            wp_enqueue_script('aos');

            wp_enqueue_style('select2_css');
            wp_enqueue_script('select2_js');

            // blog pages
            if (is_singular("blog")) {
                // codemirror
                wp_enqueue_style('codemirror');
                wp_enqueue_style('codemirror_theme');
                wp_enqueue_script('codemirror');
                wp_enqueue_script('codemirror_html');
                wp_enqueue_script('codemirror_css');
                wp_enqueue_script('codemirror_js');
            }

            // keywords tool
            if(is_page_template( 'templates/keywords.php' )) {
                wp_enqueue_style('toastr');
                wp_enqueue_script('toastr');

                wp_enqueue_style('charts');
                wp_enqueue_script('charts_js');
                wp_enqueue_script('charts_js_ex');

                wp_enqueue_script('list_js');

                wp_enqueue_style('multijs_css');
                wp_enqueue_script('multijs');

                wp_enqueue_script('kwt-common-js');

                wp_enqueue_style('kwt_style');
                // wp_enqueue_script('charts_js_theme');
            }

            // LK
            if(is_page_template( 'templates/members-user.php' )) {
                wp_enqueue_script('lk-common-js');
                wp_enqueue_style('lk_style');
            }

            //UTM
            if(is_page_template( 'templates/utm.php' ) || is_page_template( 'templates/utm-en.php' )) {
                wp_enqueue_style('utm_style');
            }

            wp_enqueue_script('maskedinput');
            wp_enqueue_style('grid');

            //subscribe page
            if(is_page_template( 'templates/dispatch-big-page.php' )) {
                wp_enqueue_style('intltel_css');
                //wp_enqueue_style('intltel_demo_css');
                wp_enqueue_script('intltel_js');
            }

            wp_enqueue_script('common-js');
            wp_enqueue_style('main_style');
            wp_enqueue_script('jquery');

            if(is_page_template( 'templates/utm.php' )) {
                wp_enqueue_style('style_angular');
                wp_enqueue_script('inline_angular');
                wp_enqueue_script('polyfill_angular');
                wp_enqueue_script('main_angular');
            }


            // Стили для страницы карьера
            if(is_page_template( 'templates/career-page.php' ) || is_singular("vacancy") ) {
                wp_enqueue_style('career_style');
            }

            // Amazon
            if(is_page_template( 'templates/amazon-page.php' || 'templates/amazon-page-en.php' ) ) {
                wp_enqueue_style('amazon-page');
            }

        }
    }


## Часть стилей в footer
    add_action('get_footer', 'my_style_method');
    function my_style_method() {
        wp_enqueue_style('awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null, null);
    };


    add_action( 'admin_enqueue_scripts', 'enqueue_admin_scripts__theme');

    /* Кастомные скрипты для админки */
    function enqueue_admin_scripts__theme () {
        wp_register_style('charts', ABS_ASSETS_URI . '/libs/highcharts/css/highcharts.css', array(), '1.0.0', null);
        wp_register_script('charts_js', ABS_ASSETS_URI . '/libs/highcharts/js/highcharts.js', array('jquery'), '1.0.0', true);
        wp_register_script('charts_js_ex', ABS_ASSETS_URI . '/libs/highcharts/js/modules/exporting.js', array('jquery'), '1.0.0', true);

        wp_enqueue_style('charts');
        wp_enqueue_script('charts_js');
        wp_enqueue_script('charts_js_ex');

        wp_register_script('custom_admin', ABS_ASSETS_URI . '/js/custom_admin.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style('jquery-ui-datepicker', ABS_ASSETS_URI . '/libs/datepicker/datepicker.css', array(), '1.0.0', null);
        wp_enqueue_script('custom_admin');
        wp_enqueue_style('custom_admin', ABS_ASSETS_URI . '/css/custom_admin.css', array(), null, null);
    }



## Register menu
    add_action('after_setup_theme', function () {
        register_nav_menus(array(
            'main_menu' => 'Основное меню',
            'main_menu_mobile' => 'Мобильное меню',
            'footer_menu' => 'Меню в подвале',
        ));
    });


    /*
     * Получение дерева таксономий
     */
    function get_taxonomy_hierarchy( $taxonomy, $parent=0) {
        // only 1 taxonomy
        $taxonomy=is_array( $taxonomy) ? array_shift( $taxonomy): $taxonomy;
        // get all direct decendants of the $parent
        $terms=get_terms( $taxonomy, array( 'parent'=> $parent, 'hide_empty'=> 0));
        // prepare a new array.  these are the children of $parent
        // we'll ultimately copy all the $terms into this new array, but only after they
        // find their own children
        $children=array();
        // go through all the direct decendants of $parent, and gather their children
        foreach ( $terms as $term) {
            // recurse to get the direct decendants of "this" term
            $term->children=get_taxonomy_hierarchy( $taxonomy, $term->term_id);
            // add the term to our new array
            $children[$term->term_id]=$term;
        }
        // send the results back to the caller
        return $children;
    }

    function get_cat_tree_with_levels($cat_arr, $level = 1, $cur_id) {
        static $result = array();
        if(is_array($cat_arr)){
            foreach ($cat_arr as $key => $value) {
                $result[$level][$key] = array(
                    'id'     => $value->term_id,
                    'name'   => $value->name,
                    'parent' => $value->parent,
                    'slug'   => $value->slug,
                    'link'   => get_term_link( $value->term_id ),
                    'active' => $cur_id === $value->term_id || is_array($value->children[$cur_id]) ? true : false
                );
                if (is_array($value->children)){
                    //$cur_id = $cur_id === $value->children[] ? $value->parent : $cur_id;
                    get_cat_tree_with_levels($value->children, $level+1, $cur_id);
                }
            }
        }
        return $result;
    }





## Remove H2 in template standart pagination
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
    function my_navigation_template($template, $class)
    {
        return '
  <nav class="navigation %1$s" role="navigation">
    <div class="nav-links">%3$s</div>
  </nav>
  ';
    }




// Exclude pages from WordPress Search
// разрешить для поиска только post_type=blog
    if (!is_admin()) {
        function wpb_search_filter($query)
        {
            if ($query->is_search) {
                $query->set('post_type', 'blog');
            }
            return $query;
        }

        add_filter('pre_get_posts', 'wpb_search_filter');
    }
    /* KEYWORDS TOOL */

    /* Функция запроса на апи гугл и яндекс */
    add_action('wp_ajax_nopriv_loadmore', 'get_more_gallery');
    add_action('wp_ajax_loadmore', 'get_more_gallery');
    /*Сохранение проекта с фронта в личный кабинет*/
    add_action('wp_ajax_nopriv_saveProject', 'saveProject');
    add_action('wp_ajax_saveProject', 'saveProject');
    /*add_action('wp_ajax_nopriv_getLang', 'getLang');
    add_action('wp_ajax_getLang', 'getLang');*/
    /* Функция получения всех населенных пунктов выбранной страны */
    add_action('wp_ajax_nopriv_GetGeo', 'GetGeo');
    add_action('wp_ajax_GetGeo', 'GetGeo');
    /* Удаление проекта из ЛК */
    add_action('wp_ajax_nopriv_deleteProject', 'deleteProject');
    add_action('wp_ajax_deleteProject', 'deleteProject');
    /*Добавление групп*/
    add_action('wp_ajax_nopriv_addGroup', 'addGroup');
    add_action('wp_ajax_addGroup', 'addGroup');
    /* Export в xls */
    add_action('wp_ajax_nopriv_keywordExport', 'keywordExport');
    add_action('wp_ajax_keywordExport', 'keywordExport');
    /* Удаление слова из таблиц */
    add_action('wp_ajax_nopriv_removeKey', 'removeKey');
    add_action('wp_ajax_removeKey', 'removeKey');
    /* Удаление группы*/
    add_action('wp_ajax_nopriv_removeGroup', 'removeGroup');
    add_action('wp_ajax_removeGroup', 'removeGroup');
    /* Изменение группы*/
    add_action('wp_ajax_nopriv_changeGroup', 'changeGroup');
    add_action('wp_ajax_changeGroup', 'changeGroup');
    /* фильтр существующих слов по списку минус слов (погнали костыли) */
    add_action('wp_ajax_nopriv_reSort', 'reSort');
    add_action('wp_ajax_reSort', 'reSort');

    /* получение слов в зависимости от группы */
    add_action('wp_ajax_nopriv_groupKeywords', 'groupKeywords');
    add_action('wp_ajax_groupKeywords', 'groupKeywords');

    /*переименование проекта*/
    add_action('wp_ajax_nopriv_renameProject', 'renameProject');
    add_action('wp_ajax_renameProject', 'renameProject');

    /*копирование проекта*/
    add_action('wp_ajax_nopriv_createNewProject', 'createNewProject');
    add_action('wp_ajax_createNewProject', 'createNewProject');

    add_action( 'wp_ajax_changePass', 'changePass' );
    add_action( 'wp_ajax_nopriv_changePass', 'changePass' );

// php

    function getGoogleTry()
    {
        return $google_res = GetKeywordIdeas::main();
    }

    function renameProject()
    {
        global $wpdb;
        $json_result = array();
        $title = strip_tags(trim($_POST['title']));
        $project_id = intval($_GET['id']);

        $q = "SELECT count(id) as id FROM projects WHERE id = $project_id AND title = '$title'";
        $res = reset($wpdb->get_results($q));

        if ($res->id > 0) {
            $json_result['success'] = false;
            $json_result['duplicate'] = true;
        } else {
            $q = "UPDATE projects set title = '$title' WHERE id = $project_id";
            $wpdb->query($q);
            $json_result['success'] = true;
        }

        header('Content-Type: application/json');
        print json_encode($json_result);
        exit();

    }

    function createNewProject()
    {
        $json_result = array();
        $json_result['success'] = false;
        global $wpdb;
        $project_id = intval($_GET['id']);

        $q = "SELECT * FROM projects WHERE id = $project_id";
        $res = reset($wpdb->get_results($q));

        if (!empty($res)) {
            $res->title = $res->title.' Копия '. date('m-d-Y H:i:s');
            $res->created_at = date('Y-m-d H:i:s');
            unset($res->id);

            $query = "INSERT INTO projects (
                    user_id,
                    title,
                    language,
                    currency,
                    country,
                    cities,
                    created_at,
                    updated_at
                    ) VALUES (
                          $res->user_id,
                          '$res->title',
                          '$res->language',
                          '$res->currency',
                          '$res->country',
                          '$res->cities',
                          '$res->created_at',
                          '$res->created_at'
                    )";

            $wpdb->query($query);
            $json_result['success'] = true;
            $json_result['project_id'] = $wpdb->insert_id;
        }

        header('Content-Type: application/json');
        print json_encode($json_result);
        exit();

    }

    function get_more_gallery()
    {
        ini_set('display_errors',true);
        error_reporting(E_ALL);

        // user log start
        $log_data = array();
        $log_data['user_id'] = $_SESSION['user_id'];

        $user = User::getUserData($_SESSION['user_id']);
        $USER_ID = $_SESSION['user_id'];

        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $PROJECT_ID = intval(trim(strip_tags($_GET['id'])));
        } else {
            return false;
        }

        $system_search = trim(strip_tags($_POST['system_search']));


        $json_result = array();
        $json_result['count_results'] = 0;
        $error_code = array();

        unset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['re_excluded']);

        $yandex_res = array();
        $yandex_res['keywords'] = array();
        $google_res = array();
        $google_res['keywords'] = array();
        $pattern = '/[\@?\*?\&?\/?\"?]/';



        /*запоминаем настройки пользователя*/
        if (isset($_POST['keywords'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords'] = preg_replace($pattern, '', wp_unslash($_POST['keywords']));
            // log keywords
            $log_data['keywords'] = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords'];
        }

        if (isset($_POST['country_criteria'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['country_criteria'] = $_POST['country_criteria'];
            // log country
            $log_data['country'] = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['country_criteria'];
        }
        if (isset($_POST['keywords_limit'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_limit'] = $_POST['keywords_limit'];
        }
        if (isset($_POST['target_lang'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['target_lang'] = $_POST['target_lang'];
            // log language
            $log_data['language'] = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['target_lang'];
        }
        if (isset($_POST['included'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['included'] = preg_replace($pattern, '', wp_unslash($_POST['included']));
        }

        if (isset($_POST['included']) && !empty($_POST['included'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['included'] = preg_replace($pattern, '', wp_unslash($_POST['included']));
        } elseif(isset($_POST['strong_search']) && $_POST['strong_search'] == 'true') {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['included'] = preg_replace($pattern, '', wp_unslash($_POST['keywords']));
        } elseif (isset($_POST['strong_search']) && $_POST['strong_search'] == 'false') {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['included'] = '';
        }

        if (isset($_POST['excluded'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['excluded'] = preg_replace($pattern, '', wp_unslash($_POST['excluded']));
            // log negative_keywords
            $log_data['negative_keywords'] = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['excluded'];
        }

        if (isset($_POST['currency'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['currency'] = $_POST['currency'];
            // log currency
            $log_data['currency'] = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['currency'];
        }
        if (isset($_POST['geo_criteria'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['geo_criteria'] = $_POST['geo_criteria'];
            // log cities
            $log_data['cities'] = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['geo_criteria'];
        }
        if (isset($_POST['yandex_geo'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['yandex_geo'] = array_map('intval', $_POST['yandex_geo']);
        }


        /* Если есть попытки у пользователя */
        if($user->limit > 0) {
            /*Работаем с google api*/
            /* Если выбрали что либо кроме яндекса */
            if($system_search != 2) {
                require_once(trailingslashit(CHILD_DIR) . 'lib/google/Keywords.php');
                try {

                    $google_res = GetKeywordIdeas::main();

                    if(empty($google_res['keywords'])) {
                        $google_res['keywords'] = array();
                    }

                } catch (Exception $e) {
                    if (stripos($e->getMessage(), 'RATE_LIMIT')) {
                        while (!$google_res = getGoogleTry() || $_SESSION['google_try'] < 10) {
                            //echo 'new request'."<br>";

                            $_SESSION['google_try'] += 1;
                        }
                        if($_SESSION['google_try'] >= 10) {
                            $_SESSION['google_try'] = 0;
                        }

                        /*if($_SESSION['user_id'] == '4433' || $_SESSION['user_id'] == '4838') {
                            $_SESSION['google_try'] = 0;

                            while (!$google_res = getGoogleTry() || $_SESSION['google_try'] < 10) {
                                echo 'new request'."<br>";

                                $_SESSION['google_try'] += 1;
                            }
                            if($_SESSION['google_try'] >= 10) {
                                $_SESSION['google_try'] = 0;
                            }*/
                        //} else {
                        //  $json_result['google']['error_code'] = 1; // превышение лимита
                        //$json_result['google']['error_message'] = preg_replace('/[<>\'\"]*/', '', $e->getMessage());
                        //}

                    } elseif(stripos($e->getMessage(), 'DUPLICATE_ELEMENT')) {
                        $json_result['google']['error_code'] = 2; // дубликаты слов
                        $json_result['google']['error_message'] = preg_replace('/[<>\'\"]*/', '', $e->getMessage());
                        $google_res['keywords'] = array();
                    } elseif(stripos($e->getMessage(), 'TOO_MANY')) {
                        $json_result['google']['error_code'] = 3; // слишком много минус слов
                        $json_result['google']['error_message'] = preg_replace('/[<>\'\"]*/', '', $e->getMessage());
                        $google_res['keywords'] = array();
                    } else {
                        $json_result['google']['error_code'] = 666; // неизвестная ошибка
                        $json_result['google']['error_message'] = preg_replace('/[<>\'\"]*/', '', $e->getMessage());
                        $google_res['keywords'] = array();
                    }
                }
            }

            // log search_system
            $log_data['search_system'] = $system_search;

            /*Google api end*/
            ///////////////////////////////////////////////////////////
            /*Работаем с yandex api*/
            if($system_search != 1) {
                require_once(trailingslashit(CHILD_DIR) . 'lib/yandex/YandexWordstat.php');
                try {

                    /* Узнаем текущие лимиты и номер аккаунта яндекса */
                    $options = get_option('wps_theme_main_settings_sub');
                    $accNumber = $options['yandex_current_account'];
                    $accLimit = $options['yandex_current_limit'];
                    //echo $accLimit;

                    $user_keywords = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords'];
                    if (isset($user_keywords)) {
                        $keyword_to_search = explode("\n", $user_keywords);
                        foreach ($keyword_to_search as $id => $kw_search) {
                            if (empty($kw_search)) {
                                unset($keyword_to_search[$id]);
                            }
                        }
                    }
                    $user_count_words = count($keyword_to_search);


                    /* если слов осталось 100 то переключаем аккаунт, для перестраховки  */
                    if($accLimit <= 100) {
                        if($accNumber < 7) {
                            $accNumber++;
                            /* если номер аккаунта меньше 7 то увеличим номер, иначе начинаем с начала */
                            $option_update['yandex_current_limit'] = 900;
                            $option_update['yandex_current_account'] = $accNumber;
                            update_option( "wps_theme_main_settings_sub",  $option_update);
                        } else {
                            $accNumber = 1;
                            $option_update['yandex_current_limit'] = 900;
                            $option_update['yandex_current_account'] = $accNumber;
                            update_option( "wps_theme_main_settings_sub",  $option_update);
                        }
                        $accLimit = 900;
                        $user_count_words = 0;
                    }

                    $yandex_res = getYandexData::GetKeywords($accNumber);

                    if(empty($yandex_res['keywords'])) {
                        $yandex_res['keywords'] = array();
                    }
                    if(!isset($yandex_res['searched_also']) && empty($yandex_res['searched_also'])) {
                        $yandex_res['searched_also'] = array();
                    }


                } catch (Exception $e) {
                    $json_result['yandex']['error_code'] = 1;
                    $json_result['yandex']['error_message'] = preg_replace('/[<>\'\"]*/', '', $e->getMessage());
                    $yandex_res['keywords'] = array();
                    //print_r($json_result['yandex']);
                }
            }

            /*Yandex api end*/

            /*Формирование результатов*/
            if (!empty($google_res['keywords']) || !empty($yandex_res['keywords'])) {
                $all_keywords = array();
                $all_keywords = array_merge($google_res['keywords'],$yandex_res['keywords']);

                $array_vars['res'] = $all_keywords;
                //$array_vars['searched_also'] = $yandex_res['searched_also'];
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results'] = $array_vars;

                //saveProject();
                $filter['new_exc'] = null;
                if(isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['re_excluded'])) {
                    $filter['new_exc'] = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['re_excluded'];
                }

                saveProject();
                $results = User::getProject($PROJECT_ID, $filter);

                if(!empty($results)) {
                    $array_var = array();
                    $json_result['success'] = true;
                    $res_include = requireToVar('parts/keywords_table.php', $results);
                    $json_result['data'] = $res_include;
                    $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results']['res'] = $results['res'];

                    $cnt_results = 0;
                    foreach ($results['res'] as $temp_item) {
                        if($temp_item->visible) {
                            $cnt_results +=1;
                        }
                    }
                    $json_result['count_results'] = $cnt_results;
                    // log result_count
                    $log_data['result_count'] = $cnt_results;
                }

                /* $res_include = requireToVar('parts/keywords_table.php', $array_vars);
                 $json_result['data'] = $res_include;
                 $json_result['success'] = true;
                 $json_result['count_results'] = count($all_keywords);*/

                update_post_meta($_SESSION['user_id'],'limit',--$user->limit);

                if($system_search != 1) {
                    $option_update['yandex_current_limit'] = $accLimit-$user_count_words;
                    $option_update['yandex_current_account'] = $accNumber;
                    update_option( "wps_theme_main_settings_sub",  $option_update);
                }


            } else {
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results'] = array();
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results']['res'] = array();
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_keywords']['res'] = array();
                saveProject();
                $json_result['success'] = false;
            }
        } else {
            /* Если попытки закончились */
            $json_result = array();
            $json_result['success'] = false;
            $json_result['error_code'] = 100; // слишком много минус слов
            $json_result['error_message'] = 'limit exceed'; // слишком много минус слов
        }

        /*выдача результатов*/
        header('Content-Type: application/json');
        print json_encode($json_result);

        // log project_id
        $log_data['project_id'] = $PROJECT_ID;

        // log response
        if (isset($json_result['success'])){
            $log_data['response']['success'] = 'success: '.$json_result['success'];
        }
        if (isset($json_result['google']['error_message'])){
            $log_data['response']['google'] = 'google: '.$json_result['google']['error_message'];
        }
        if (isset($json_result['yandex']['error_message'])){
            $log_data['response']['yandex'] = 'yandex: '.$json_result['yandex']['error_message'];
        }

        // log strong_search
        $log_data['strong_search'] = isset($_POST['strong_search']) ? $_POST['strong_search'] : "";

        // log end
        UserLogs::addSearchLog($log_data);

        exit();
    }


    function groupKeywords()
    {
        $json_result = array();
        global $wpdb;

        $project_id = intval($_GET['id']);
        $group_id = $_POST['group_id'];

        /*if ($group_id == 'all') {
            $query = "SELECT id, groupd_id, project_id, title, keywords FROM project_groups_keywords WHERE project_id = '$project_id'";
        } else {
            $query = "SELECT id, groupd_id, project_id, title, keywords FROM project_groups_keywords WHERE project_id = $project_id AND group_id = $group_id";
        }*/

        if ($group_id != 'all') {
            $query = "SELECT
                id,
                group_id,
                project_id,
                keywords as keyword,
                search_volume,
                average_cpc,
                competition,
                year_stats_stock_x,
                year_stats_stock_y,
                source,
                visible
                FROM project_groups_keywords
                WHERE project_id = $project_id
                AND group_id = $group_id
               ";
        } else {
            $query = "SELECT
                id,
                project_id,
                keyword,
                search_volume,
                average_cpc,
                competition,
                year_stats_stock_x,
                year_stats_stock_y,
                source,
                visible
                FROM project_keywords
                WHERE project_id = $project_id
                AND keyword NOT IN (
                      SELECT keywords FROM project_groups_keywords WHERE project_id = $project_id
                      )";
        }

        //echo $query;

        //$raw_export_data = $wpdb->get_results($query);
        // echo $query;
        //$wpdb->query($query);

        $results['res'] = $wpdb->get_results($query);
        $json_result['success'] = true;
        $res_include = requireToVar('parts/keywords_table.php', $results);
        $json_result['data'] = $res_include;

        header('Content-Type: application/json');
        print json_encode($json_result);
        exit();
    }

    /* Получение населенных пунктов страны */
    function GetGeo($id = null)
    {
        if (!empty($_POST['criteria_id'])) {
            $criteria_id = $_POST['criteria_id'];
        } elseif (!empty($id)) {
            $criteria_id = $id;
        } else {
            return false;
        }

        $country_code = null;
        global $wpdb;
        $json_result = array();

        $geodatas = $wpdb->get_results("SELECT country_code FROM wp_criteries WHERE criteria_id = $criteria_id  LIMIT 1");

        if (!empty($geodatas)) {
            $country_code = $geodatas[0]->country_code;
        }

        if($country_code != 'US') {
            $country_data = $wpdb->get_results("SELECT DISTINCT criteria_id,name,canonical_name,yandex_id FROM wp_criteries WHERE country_code = '$country_code' AND target_type = 'City' ORDER  BY name ASC ");
        } elseif ($country_code == 'US') {
            $country_data = $wpdb->get_results("SELECT DISTINCT criteria_id,name,canonical_name,yandex_id FROM wp_criteries WHERE country_code = '$country_code' AND target_type = 'State' ORDER  BY name ASC ");
        }

        /*country_code = '$country_code'*/

        if (!empty($_POST['criteria_id'])) {
            if (!empty($country_data)) {
                $json_result['success'] = true;
            } else {
                $json_result['success'] = false;
            }
            $json_result['data'] = $country_data;

            header('Content-Type: application/json');
            print json_encode($json_result);
            exit();
        } elseif (!empty($id)) {
            return $country_data;
        }
    }

    /* Сохранение покдлючаемого файла в переменную */
    function requireToVar($file, $array = null)
    {
        ob_start();
        extract($array);
        include "$file";
        return ob_get_clean();
    }

    /* KEYWORDS TOOL END*/


    /* ELEMENTOR LINKS REPLACE */
    function elementorContentEditorReplace()
    {
        $args = array(
            'post_type' => 'blog',
            'posts_per_page' => -1,
        );
        $all_posts = get_posts($args);
        foreach ($all_posts as $post) {
            // get data
            $elementor_data = json_decode(get_post_meta($post->ID, "_elementor_data", true));

            // 1 lev
            foreach ($elementor_data as $key1 => $data) {
                $level1_tmp = $data->elements;
                // 2 lev
                foreach ($level1_tmp as $key2 => $level1_value) {
                    $level2_tmp = $level1_value->elements;
                    // 3 lev
                    foreach ($level2_tmp as $key3 => $level2_value) {
                        $level3_tmp = $level2_value->settings->editor;
                        $elementor_edit_new = str_replace("https://dp.pengstud.com/wp-content/uploads/", "https://pengstud.com/wp-content/uploads_from_dp/", $level3_tmp);
                        $elementor_data[$key1]->elements[$key2]->elements[$key3]->settings->editor = $elementor_edit_new;
                    }
                }
            }

            $elementor_data_result = json_encode($elementor_data);
            // set data
            update_post_meta($post->ID, "_elementor_data", wp_slash($elementor_data_result));
        }
    }
//elementorContentEditorReplace();


    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['save_project'])) {
        saveProject();
    }
    function saveProject() {
        global $wpdb;
        $json_result = array();

        /* обьявим переменные для надежности */
        $title = '';
        $keywords = '';
        $country = '';
        $language = 0;
        $excluded = '';
        $currency = '';
        $cities = '';
        $id = 0;
        //[$USER_ID][$PROJECT_ID]
        $USER_ID = $_SESSION['user_id'];
        $PROJECT_ID = intval(trim(strip_tags($_GET['id'])));
        if(isset($PROJECT_ID) && !empty($PROJECT_ID)) {
            $id = intval($PROJECT_ID);
        }
        /*Сразу создаем проект*/
        if(isset($_POST['project_title'])) {
            $title = wp_strip_all_tags($_POST['project_title']);
        } else {
            $title = wp_strip_all_tags($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_title']);
        }
        //$title = wp_strip_all_tags($_SESSION['project_title']);


        if (isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords'])) {
            $keywords =  wp_strip_all_tags(wp_slash($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords'])) ;
        }
        if (isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['country_criteria'])) {
            $country = wp_strip_all_tags($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['country_criteria']);
        }
        if (isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['target_lang'])) {
            $language = wp_strip_all_tags($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['target_lang']);
        }
        if (isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['excluded'])) {
            $excluded = wp_strip_all_tags(($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['excluded']));
        }
        if(isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['re_excluded'])) {
            $excluded = wp_strip_all_tags(($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['re_excluded']));
        }

        if (isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['included'])) {
            $included = wp_strip_all_tags(wp_slash($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['included']));
        }
        if (isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['currency'])) {
            $currency = wp_strip_all_tags($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['currency']);
        }
        if (isset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['geo_criteria'])) {
            $cities = serialize($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['geo_criteria']);
        }

        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];
        /*Создаем проект*/
        $query = "REPLACE INTO projects (
                      id,
                      user_id,
                      title,
                      language,
                      currency,
                      country,
                      cities,
                      keywords,
                      excluded,
                      included,
                      created_at,
                      updated_at)
              VALUES ($id,$user_id,'$title','$language','$currency','$country','$cities','$keywords','$excluded', '$included','$created_at','$updated_at')";

        //echo $query;

        $result = $wpdb->get_results($query);
        $insert_id = $wpdb->insert_id;
        if(!empty($insert_id)) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_id'] = $insert_id;
            $project_id = $insert_id;
            $user_id = $_SESSION['user_id'];
            /*Если проект успешно создан - запишем его ключевые слова */
            if(!empty($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results']['res'])) {
                $keywords_to_db = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results']['res'];
            } else {
                $keywords_to_db = $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_keywords']['res'];
            }

            $query_array = array();

            if(is_array($keywords_to_db) && !empty($keywords_to_db)) {
                foreach ($keywords_to_db as $keyword) {
                    if(isset($keyword->year_stats_stock) && isset($keyword->year_stats_stock['x'])) {
                        $chart_x = serialize($keyword->year_stats_stock['x']);
                        $chart_y = serialize($keyword->year_stats_stock['y']);
                    } else {
                        $chart_x = 0;
                        $chart_y = 0;
                    }
                    $keyword_escape = wp_slash($keyword->keyword);
                    $query_array[] = "( $project_id, $user_id, '$keyword_escape', '$keyword->search_volume', '$keyword->average_CPC', '$keyword->competition', '$chart_x', '$chart_y','$keyword->source')";
                }
                $real_query_string = implode(',',$query_array);
                $query = "DELETE FROM project_keywords WHERE project_id = $project_id AND user_id = $user_id";
                $wpdb->query($query);

                $query = "INSERT INTO project_keywords (
                          project_id,
                          user_id,
                          keyword,
                          search_volume,
                          average_cpc,
                          competition,
                          year_stats_stock_x,
                          year_stats_stock_y,
                          source)
                          VALUES
                          $real_query_string";

                $wpdb->query($query);
            } else {
                $query = "DELETE FROM project_keywords WHERE project_id = $project_id AND user_id = $user_id";
                $wpdb->query($query);
            }


        } else {
            return false;
        }
        return $project_id;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_project_id'])) {
        global $wpdb;
        if(!empty($_POST['user_project_id'])) {
            $project_id = $_POST['user_project_id'];
            ///$_SESSION['project_id'] = $project_id;
            header('Location: /keywords-tool?id='.$project_id);
            exit();
        } else {
            /*unset($_SESSION['target_lang']);
            unset($_SESSION['currency']);
            unset($_SESSION['country_criteria']);
            unset($_SESSION['geo_criteria']);
            unset($_SESSION['keywords']);
            unset($_SESSION['excluded']);
            unset($_SESSION['included']);
            unset($_SESSION['project_keywords']);
            unset($_SESSION['keywords_results']);
            unset($_SESSION['title']);
            unset($_SESSION['project_id']);
            unset($_SESSION['re_excluded']);*/

            /*Создаем новый проект*/
            if(!empty($_POST['project_title'])) {
                $_SESSION['project_title'] = trim(strip_tags(wp_unslash($_POST['project_title'])));
            } else {
                $_SESSION['project_title'] = 'ProjectX-'.date('d-m-y H:i:s');
            }
            unset($_POST['user_project_id']);
            $title = trim(strip_tags(wp_unslash($_POST['project_title'])));
            $user_id = $_SESSION['user_id'];
            $query = "SELECT id FROM projects WHERE title = '$title' AND user_id = $user_id LIMIT 1";
            $result = $wpdb->get_results($query);
            //print_r($result);
            if(empty($result) || count($result) == 0) {
                $project_id = saveProject();
                header('Location: /keywords-tool?id='.$project_id);
                exit();
            } else {
                $error_project['error_duplicate'] = true;
                extract($error_project);
            }


        }
    }

    function deleteProject()
    {
        global $wpdb;
        $json_result = array();
        $user_id = $_SESSION['user_id'];
        $project_id = $_POST['delete_project_id'];

        $query = "DELETE FROM project_keywords WHERE project_id = $project_id AND user_id = $user_id";
        $wpdb->query($query);

        $query = "DELETE FROM projects WHERE id = $project_id AND user_id = $user_id";
        $wpdb->query($query);

        $query = "DELETE FROM project_groups_keywords WHERE project_id = $project_id";
        $wpdb->query($query);

        $query = "DELETE FROM project_groups WHERE project_id = $project_id";
        $wpdb->query($query);
        $json_result['success'] = true;

        print json_encode($json_result);
        exit();
    }

    function addGroup ()
    {
        global $wpdb;
        $json_result = array();
        $json_result['new'] = false;
        $project_id = $_POST['project_id'];
        if(isset($_POST['title'])) {
            $title = wp_slash($_POST['title']);
        }

        $keywords = $_POST['keywords'];
        $keywords_ids = $_POST['keywords_ids'];



        if($_POST['group_id']) {
            $group_id = intval($_POST['group_id']);
        } else {
            $group_id = 'new';
        }
        if(isset($title) && $title == '') {
            print json_encode($json_result);
            exit();
        }

        if($group_id == 'new' && $group_id != 'all' && !empty($title)) {
            /* проверяем, нет ли такой группы уже */
            $q = "SELECT id FROM project_groups WHERE title = '$title' AND project_id = $project_id LIMIT 1 ";
            $cnt = $wpdb->get_results($q);
            if(empty($cnt)) {


                $query = "INSERT INTO project_groups (project_id,title) VALUES ($project_id,'$title')";
                $wpdb->query($query);
                $group_id = $wpdb->insert_id;

                $json_result['new'] = true;
            } else {
                $json_result['error_message'] = 'duplicate';
                $json_result['error_code'] = '1';
            }


        } elseif ($group_id == 'all') {
            foreach ($keywords as $key) {
                $query = "DELETE FROM project_groups_keywords WHERE project_id = $project_id AND keywords = '$key'";
                $wpdb->query($query);
            }
        }

        /* Проверка на существование слова в группе, если слово есть - перебрасываем в другую группу */
        foreach ($keywords as $key) {
            $query = "DELETE FROM project_groups_keywords WHERE project_id = $project_id AND keywords = '$key'";
            $wpdb->query($query);
        }
        /* $query = "DELETE FROM project_groups_keywords WHERE project_id = $project_id AND keywords in ($keywords)";
         $wpdb->query($query);*/
        if($group_id != 'all') {


            foreach ($keywords as $index => $kw_to_db) {

                $k_id = $keywords_ids[$index];
                $q = "SELECT * FROM project_keywords WHERE id = '$k_id' AND project_id = $project_id LIMIT 1";
                $res = $wpdb->get_results($q);
                $res = reset($res);


                $query = "INSERT INTO project_groups_keywords (
                            project_id,
                            group_id,
                            keywords,
                            search_volume,
                            average_cpc,
                            competition,
                            year_stats_stock_x,
                            year_stats_stock_y,
                            source,
                            visible) VALUES (
                                  $project_id,
                                  $group_id,
                                  '$kw_to_db',
                                  '$res->search_volume',
                                  '$res->average_cpc',
                                  '$res->competition',
                                  '$res->year_stats_stock_x',
                                  '$res->year_stats_stock_y',
                                  '$res->source',
                                  '$res->visible'
                                  )";
                // echo $query.PHP_EOL;
                $wpdb->query($query);
            }
        }

        /*$query = "SELECT group_id FROM project_groups_keywords WHERE keywords in($keywords)  AND project_id = $project_id";
        $res = $wpdb->get_results($query);*/
        /*if( !empty($res) && $res[0]->group_id > 0) {
            $query = "UPDATE project_groups_keywords SET project_id = $project_id,
                                                          group_id = $group_id,
                                                          keywords = '$keywords'
                                                          WHERE project_id = $project_id AND keywords in ($keywords)";
        } elseif($group_id != 'all') {
            foreach ($keywords as $kw_to_db) {
                $query = "INSERT INTO project_groups_keywords (project_id,group_id,keywords) VALUES ($project_id, $group_id, '$kw_to_db')";
                $wpdb->query($query);
            }

        } else {
            $query = 0;
        }*/

        if(!empty($query)) {
            $json_result['group_id'] = $group_id;
            $json_result['success'] = true;
        } elseif($group_id == 'all') {
            $json_result['success'] = true;
        } else {
            $json_result['success'] = false;
        }
        if($group_id == 'all') {
            $json_result['group_id'] = 'all';
        }

        header("Content-type: application/json; charset=UTF-8");
        header("Cache-Control: must-revalidate");
        header("Pragma: no-cache");
        header("Expires: -1");

        print json_encode($json_result);
        die();
    }

    function removeKey()
    {
        global  $wpdb;
        $json_result = array();
        $json_result['success'] = false;
        $project_id = intval(trim(strip_tags($_GET['id'])));
        $user_id = $_SESSION['user_id'];
        $USER_ID = $_SESSION['user_id'];
        $PROJECT_ID =  $project_id;

        $keywords_id = strip_tags($_POST['keyword_id']);
        $keyword = strip_tags(wp_slash($_POST['keyword']));

        if(!empty($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results']['res'])) {
            //$keywords_to_db = $_SESSION['keywords_results']['res'];

            foreach( $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results']['res'] as $index => $struct) {
                if ($keywords_id == $struct->id) {
                    unset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results']['res'][$index]);
                    break;
                }
            }
        } else {
            //$keywords_to_db = $_SESSION['project_keywords']['res'];
            foreach( $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_keywords']['res'] as $index => $struct) {
                if ($keywords_id == $struct->id) {
                    unset($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_keywords']['res'][$index]);
                    break;
                }
            }
        }


        if ($_POST['type'] == 'search') {
            $query = "DELETE FROM project_keywords WHERE id = $keywords_id AND project_id = $project_id AND user_id = $user_id LIMIT 1";
        } elseif ($_POST['type'] == 'group') {
            $query = "DELETE FROM project_groups_keywords WHERE id = $keywords_id AND project_id = $project_id LIMIT 1";
        } else {
            $query = "DELETE FROM project_keywords WHERE id = $keywords_id AND project_id = $project_id AND user_id = $user_id LIMIT 1";
        }
        //$query = "UPDATE project_keywords SET visible = 0 WHERE id = $keywords_id AND project_id = $project_id AND user_id = $user_id LIMIT 1";

        //echo $query;
        if($wpdb->query($query)) {
            $json_result['success'] = true;
        } else {
            $json_result['error'] = 'update error';
        }

        print json_encode($json_result);
        exit();
    }

    function removeGroup()
    {
        global $wpdb;
        $json_result = array();
        $json_result['success'] = false;

        $group_id = strip_tags($_POST['group_id']);
        $project_id = intval(trim(strip_tags($_GET['id'])));

        $query = "DELETE FROM project_groups WHERE id = $group_id AND project_id = $project_id LIMIT 1";
        if($wpdb->query($query)) {
            $query = "DELETE FROM project_groups_keywords WHERE group_id = $group_id AND project_id = $project_id";
            //echo $query;
            $wpdb->query($query);
            $json_result['success'] = true;
        } else {
            $json_result['error'] = 'delete error';
        }

        print json_encode($json_result);
        exit();
    }

    function changeGroup()
    {
        global $wpdb;
        $json_result = array();
        $json_result['success'] = false;

        $group_id = strip_tags($_POST['group_id']);
        $project_id = intval(trim(strip_tags($_GET['id'])));
        $new_title = strip_tags(wp_slash($_POST['new_name']));

        $query = "UPDATE project_groups SET title = '$new_title' WHERE id = $group_id AND project_id = $project_id LIMIT 1";
        if($wpdb->query($query)) {
            $json_result['success'] = true;
        } else {
            $json_result['error'] = 'change error';
        }

        print json_encode($json_result);
        exit();
    }

    function reSort() {
        $json_result = array();
        $json_result['success'] = false;
        $pattern = '/[\@?\*?\&?\/?\"?]/';
        $USER_ID = $_SESSION['user_id'];
        $PROJECT_ID = intval(trim(strip_tags($_GET['id'])));

        if (isset($_POST['excluded'])) {
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['excluded'] =  preg_replace($pattern, '', $_POST['excluded']);
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['re_excluded'] = preg_replace($pattern, '', $_POST['excluded']);
        }
        saveProject();

        $keyword_to_exluded = explode("\n", $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['excluded']);
        foreach ($keyword_to_exluded as $id => $kw_ex) {
            if (empty($kw_ex)) {
                unset($keyword_to_exluded[$id]);
            }
        }

        $filter['new_exc'] = $keyword_to_exluded;
        $results = User::getProject($PROJECT_ID, $filter);
        if(!empty($results)) {
            $array_var = array();
            $json_result['success'] = true;
            $res_include = requireToVar('parts/keywords_table.php', $results);
            $json_result['data'] = $res_include;
            $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords_results']['res'] = $results['res'];

            $cnt_results = 0;
            foreach ($results['res'] as $temp_item) {
                if($temp_item->visible) {
                    $cnt_results +=1;
                }
            }
            $json_result['count_results'] = $cnt_results;
        }

        print json_encode($json_result);
        exit();
    }

    if(isset($_GET['miha_test'])) {
        $_SESSION['miha_test'] = true;
    }


    /* SENDPULSE */
    function subscribeContact($data)
    {
        if(!empty($data)) {
            $data = (object)$data;
            $tokenInfo = getSendpulseToken();
            $tokenInfo = json_decode($tokenInfo, true);
            $token = 'Bearer ' . $tokenInfo['access_token'];
            $headers = ['Authorization: ' . $token];
            $value = ['emails' => serialize([$data->contact->channels[0]['value']])];
            $url = 'https://api.sendpulse.com/addressbooks/' . constant($data->sendpulseBook) . '/emails';
			file_put_contents(__DIR__ . '/marielle.txt', print_r($data, true), FILE_APPEND);
			file_put_contents(__DIR__ . '/marielle.txt', print_r($token, true), FILE_APPEND);
			file_put_contents(__DIR__ . '/marielle.txt', print_r($value, true), FILE_APPEND);
            sendRequest($url, $value, $headers);
        }

    }


    function getSendpulseToken()
    {
        $url = 'https://api.sendpulse.com/oauth/access_token';
        $value = [
            'grant_type' => 'client_credentials',
            'client_id' => SENDUPULSE_ID,
            'client_secret' => SENDUPULSE_SECRET,
        ];
        $tokenInfo = sendRequest($url, $value);

        return $tokenInfo;
    }

//function smartSend($id,$data) {
//    if(!empty($id) && !empty($data)) {
//        $url = 'https://esputnik.com/api/v1/message/'.$id.'/smartsend';
//        $res = sendRequest($url,$data);
//    }
//}

    function sendRequest($url, $value = null, $headers = null)
    {

        $ch = curl_init();
        if(isset($value)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $value);
        }
        curl_setopt($ch, CURLOPT_HEADER, 0);
		if ($headers) {
        	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		}
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
		file_put_contents(__DIR__ . '/marielle.txt', print_r($output, true), FILE_APPEND);
        return $output;
    }



//Description: Корректировка многостраничных страниц и записей
    add_action( 'template_redirect', 'alpf_template_redirect' );
    function alpf_template_redirect() {
        if ( is_singular() ) {
            global $post, $wp_query;
            $page = get_query_var('page');
            if ( $page < 2 ) return;
            $pages = explode('<!--nextpage-->', $post->post_content);
            $numpages = count($pages);
            if ($numpages < $page) {
                $wp_query->set_404();
                status_header( 404 );
                nocache_headers();
                $wp_query->post_count = 0;
            }
        }
    }



    /* coockie */
    add_action('wp_ajax_nopriv_allow_penguin_cookies', 'allow_penguin_cookies');
    add_action('wp_ajax_allow_penguin_cookies', 'allow_penguin_cookies');

    function allow_penguin_cookies(){
        $status = $_POST['status'];
        $data = array(
            'status' => $status
        );
        if ($status === 'true') {
            setcookie( "allow_penguin_cookies", json_encode($data), time()+3600*24*365, '/', "");
        } else {
            setcookie( "allow_penguin_cookies", json_encode($data), time()+3600*24*7, '/', "");
        }
        exit();
    }

    function changePass()
    {
        $res = array();

        if (!empty($_POST['pass'])) {
            update_post_meta( $_SESSION['user_id'], 'user_password', password_hash($_POST['pass'], PASSWORD_DEFAULT));
            $res['success'] = true;
        } else {
            $res['success'] = false;

        }

        // more headers
        header("Content-type: application/json; charset=UTF-8");
        header("Cache-Control: must-revalidate");
        header("Pragma: no-cache");
        header("Expires: -1");

        // send result and exit
        print json_encode($res);
        exit();

    }

}



add_filter( 'aiosp_disable', 'disable_aioseop', 10, 1 );
function disable_aioseop ()
{
    $flag = false;

    if (is_tax()) {
        $flag = true;
    }
    return $flag;

}

## SET TITLE
add_action( 'pre_get_document_title', 'customTaxTitle', 1 );
function customTaxTitle(){
    // if is page acrhive custom post
    return customTitleAndDescription();
}

## SET DESCRIPTION
add_action( 'wp_head', 'wps_revrite_description', 1 );

function wps_revrite_description(){
    if (is_tax()) {
        $desciption = customTitleAndDescription();
        echo "<!-- WPS__Description -->\r\n";
        echo "<meta name='description' content='$desciption' />\r\n";
    }
}

function customTitleAndDescription()
{
    $newTitle = '';

    $currentUri  = $_SERVER['REQUEST_URI'];
    if (stristr($currentUri, '/topic/')) {
        $clearUri = str_replace('/topic/', '', $currentUri);

        $urlParts = explode('/', $clearUri);
    }

    $selectedTerms = array();

    if (!empty($urlParts)) {
        foreach ($urlParts as $uri) {
            if (!empty($uri)) {
                $selectedTerms[] = get_term_by('slug', $uri, 'topic');
            }
        }
    }

    $titlePart = array();
    if (!empty($selectedTerms)) {
        foreach ($selectedTerms as $selectedTerm) {
            if (!empty($selectedTerm)) {
                $titlePart[] = $selectedTerm->name;
            }
        }
    }

    $titlePartUnique = array_unique($titlePart);
    $newTitle = implode(' - ', $titlePartUnique) . ' | ' . get_bloginfo('name');

    $pagedTitle = '';
    $curPaged = get_query_var('paged');
    if ($curPaged) {
        $pagedTitle = __(' - Страница') . ' ' . $curPaged;
    }


    return $newTitle . ' ' . $pagedTitle;
}

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
    register_widget( 'wpb_widget_modal_form' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class wpb_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

        // Base ID of your widget
            'wpb_widget',

            // Widget name will appear in UI
            __('Form widget', 'wpb_widget_domain'),

            // Widget description
            array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
        );
    }

    // Creating widget front-end

    public function widget( $args, $instance ) {

        $title_form = apply_filters( 'widget_title', $instance['title'] );

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        // This is where you run the code and display the output
        ?>
        <section class="feedback mt-5 mb-5">
            <div class="wrapper container widget-form">
                <form method="post" class="feedback_form wps_form_js">
                    <input type="hidden" name="form_subject"  value="Get Free Analysis">
                    <input type="hidden" name="form_title"    value="<?php echo $_SERVER['REQUEST_URI']?>">
                    <h3 class="feedback_form__title">Узнайте, как улучшить свой Ads с Penguin-team!</h3>
                    <p class="feedback_form__text">
                        Закажите бесплатный анализ ROI и прибыльности ваших торговых кампаний в Google Shopping
                    </p>
                    <div class="feedback_form__row">
                        <div class="feedback_form__input_holder">
                            <input type="text" name="Name" placeholder="Имя" required>
                        </div>
                        <div class="feedback_form__input_holder">
                            <input type="email" name="Email" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="feedback_form__row">

                        <div class="feedback_form__input_holder">
                            <input class="" type="tel" name="Phone" placeholder="Номер телефона" required>
                        </div>
                    </div>
                    <div class="message_success_form">
                        <span>Ваш запрос отправлен</span>
                    </div>
                    <div class="feedback_form__submit_holder">
                        <button class="feedback_form__submit section_link" type="submit"><?php echo $title_form;?></button>
                    </div>
                </form>
            </div>
        </section>
        <?php
        echo $args['after_widget'];
    }



    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title_form = $instance[ 'title' ];
        }
        else {
            $title_form = __( 'New title', 'wpb_widget_domain' );
        }
        // Widget admin form
        ?>


        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title button:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title_form ); ?>" />


        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here




// Creating the widget
class wpb_widget_modal_form extends WP_Widget {

    function __construct() {
        parent::__construct(

        // Base ID of your widget
            'wpb_widget_modal_form',

            // Widget name will appear in UI
            __('Modal form widget', 'wpb_widget_domain'),

            // Widget description
            array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
        );
    }

    // Creating widget front-end

    public function widget( $args, $instance ) {

        $title_form_modal = apply_filters( 'widget_title', $instance['title'] );

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];


        // This is where you run the code and display the output
        ?>
        <div class="widget-modal-form-button-container">
            <a href="#" class="section_link widget-button-modal-form" data-simple_modal="modal1"><?php echo $title_form_modal; ?></a>
        </div>
        <div class="simpleModalWindowWrap modal1 widget-modal-form">
            <div class="simpleModalTable">
                <div class="simpleModalCell">
                    <div class="simpleModalWindow feedback_form_holder">
                        <span class="simpleModalWindowClose"></span>
                        <form id="widget_form_modal" method="post" class="feedback_form wps_form_js">
                            <input type="hidden" name="form_subject"  value="Get Free Analysis">
                            <input type="hidden" name="form_title"    value="<?php echo $_SERVER['REQUEST_URI']?>">
                            <p class="feedback_form__title">Узнайте, как улучшить свой Ads с Penguin-team!</p>
                            <p class="feedback_form__text">
                                Закажите бесплатный анализ ROI и прибыльности ваших торговых кампаний в Google Shopping
                            </p>
                            <div class="feedback_form__row">
                                <div class="feedback_form__input_holder">
                                    <input type="text" name="Name" placeholder="Имя" required>
                                </div>
                                <div class="feedback_form__input_holder">
                                    <input type="email" name="Email" placeholder="E-mail" required>
                                </div>
                            </div>
                            <div class="feedback_form__row">

                                <div class="feedback_form__input_holder">
                                    <input class="" type="tel" name="Phone" placeholder="Номер телефона" required>
                                </div>
                            </div>
                            <div class="message_success_form">
                                <span>Ваш запрос отправлен</span>
                            </div>

                            <div class="feedback_form__submit_holder">
                                <button class="feedback_form__submit section_link" type="submit"><?php echo $title_form_modal; ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title_form_modal = $instance[ 'title' ];
        }
        else {
            $title_form_modal = __( 'New title', 'wpb_widget_domain' );
        }
        // Widget admin form
        ?>


        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title button:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title_form_modal ); ?>" />


        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here

add_action('wp_ajax_nopriv_users_poll_action', 'users_poll_callback');
add_action('wp_ajax_users_poll_action', 'users_poll_callback');

function users_poll_callback() {

}