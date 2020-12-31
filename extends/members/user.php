<?php

add_action( 'wp_ajax_user_update_tarif', 'User::handUserUpdateTarif' );



/**
 * User
 */
class User
{

    /**
     * Возвращает статус авторизации пользователя
     * @return boolean
     */
    public static function isUserLoggedIn()
    {
        if (isset($_POST['logout'])) {
            unset($_SESSION['user_id']);
            self::removeSaveUserCoockie();
            header('Location:' . get_site_url());
        } else if (!empty($_SESSION["user_id"])) {
            $user = get_post($_SESSION["user_id"]);
            if ($user->post_status != 'publish') {
                unset($_SESSION['user_id']);
                self::removeSaveUserCoockie();
                header('Location:' . get_site_url());
            } else {
                self::checkUserTarifExpered($_SESSION["user_id"]);
                return true;
            }
        } else if (!empty($_COOKIE['penguin_auth']) && $_COOKIE['penguin_auth'] !== '') {
        	$decrypted_id = self::encrypt_decrypt('decrypt', $_COOKIE['penguin_auth']);
            $user = get_post($decrypted_id);
        	if ($user->post_status != 'publish') {
                self::removeSaveUserCoockie();
                header('Location:' . get_site_url());
            } else {
        		$_SESSION['user_id'] = $decrypted_id;
                self::checkUserTarifExpered($decrypted_id);
                return true;
            }
        }
        return false;
    }


    public static function removeSaveUserCoockie()
    {
		setcookie("penguin_auth", json_encode(), false, '/', "");
		unset( $_COOKIE['penguin_auth']); 
    }


    public static function encrypt_decrypt($action, $string) {
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = '`BJ2=^/K fgmvA)8>e<-aWQ]qW8oZ!uK1I8yF_R|ldIKO{6BzC??{oiyX~}m@sN#';
	    $secret_iv = '`BJ2=^/K fgmvA)8>e<-aWQ]qW8oZ!uK1I8yF';
	    // hash
	    $key = hash('sha256', $secret_key);
	    
	    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
	    if ( $action == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    } else if( $action == 'decrypt' ) {
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
	    return $output;
	 }



    /*
    * Провека пользователя на действие тарифа по дате
    * Если срок действия истек - переводим пользователя на базовый тариф
    */
    public static function checkUserTarifExpered($user_id)
    {
        $user_data = self::getUserData($user_id);
        $user_root = self::getUserRootData($user_id);
        $isPeriodExpired = $user_data->period_end <= date('Y-m-d');
        /*
        if ($isPeriodExpired && $user_root->slug !== "1" ) {
            self::setUserTarif($user_id, '1');
        }
        */
        if ($isPeriodExpired) {
            self::setUserTarif($user_id, '1');
        }
    }


    /**
     * Возвращает коды доступа пользователя в виде массива
     * @return array()
     */
    public static function getUserRootID($user_id)
    {
        $result = array();
        $terms = get_the_terms($user_id, "role");
        if (!empty($terms)) {
            foreach ($terms as $term) {
                $result[] = $term->slug;
            }
        }
        return $result;
    }


    /**
     * Возвращает информацию о правах пользователя в виде объекта
     * @return Object()
     */
    public static function getUserRootData($user_id)
    {
        $term_data = reset( get_the_terms($user_id, "role") );
        file_put_contents('term_data.txt',print_r($term_data,true));

        $term_custom_fields = get_term_meta( $term_data->term_id, '', true );
        if(is_array($term_custom_fields) && !empty($term_custom_fields)) {
            foreach ($term_custom_fields as $field => $value) {
                $term_data->{$field} = $value[0];
            }
        }

        return $term_data;
    }


    /*
    * Обновление тарифа вручную из админки
    */
    public static function handUserUpdateTarif($user_id, $tarif_slug){
        if ( isset($_POST['post_id'])){
            $tarif = self::updateUserTarifData($_POST['post_id']);
            echo "Тариф обновлен на '".$tarif->tarif_name."'";
        } else {
            echo "Error";
        }
        exit();
    }


    /**
     * Обновляет данные пользователя
     * Принимает Id пользователя
     * @return Object()
     */
    public static function updateUserTarifData($user_id){
        // change data user
        $tarif_data = self::getUserRootData($user_id);
        //file_put_contents('update_data.txt',print_r($user_id,true));
        $period = 30 * $tarif_data->period_length;
        update_post_meta( $user_id, 'limit', $tarif_data->search_count );
        update_post_meta( $user_id, 'period_start', date('Y-m-d') );
        update_post_meta( $user_id, 'period_end', date('Y-m-d', strtotime("+$period days")) );

        return $tarif_data;
    }


    /**
     * Устанавливает тариф пользователю
     * Принимает Id пользователя и slug тарифа
     * @return Object()
     */
    public static function setUserTarif($user_id, $tarif_slug){
        // change tarif on user
        $res = wp_set_object_terms( intval($user_id), $tarif_slug, 'role', false );

        return self::updateUserTarifData($user_id);
    }


    /**
     * Возвращает статус доступа пользователя к странице
     * Принимает массивы
     * @return boolean
     */
    public static function checkАccessUser($user_root = array(), $accessRoot = array())
    {
        $status = false;
        $result = array_intersect($accessRoot, $user_root);
        if ( $result ){
            $status = true;
        }
        return $status;
    }


    /**
     * Возвращает данные пользователя из мета-полей в виде объекта
     * @return Object()
     */
    public static function getUserData($user_id)
    {
        if (!empty($user_id)) {
            $user = get_post($user_id);
            if ($user->post_status != 'publish') {
                unset($_SESSION['user_id']);
            }
            $meta_fields = get_post_meta($user_id, '', false);
            foreach ($meta_fields as $field => $value) {
                $user->{$field} = $value[0];
            }
            return $user;
        }
        return false;
    }


    /**
     * Возвразает статус верификации пользователя
     * @return boolean
     */
    public static function isUserVerify($user_id)
    {
        $status = false;
        if (get_post_meta($user_id, "user_verify", true) == "on") {
            $status = true;
        }
        return $status;
    }


    /**
     * Проверяет код верификации
     * @return boolean
     */
    public static function checkVerifyUser()
    {
        if (!empty($_GET["verify_code"])) {
            $verify_id = self::verifyUser($_GET["verify_code"]);
            if ($verify_id) {
                $_SESSION["user_id"] = $verify_id;
            }
            header('Location:' . get_site_url() . "/user");
        }
        return false;
    }


    /**
     * Верифицирует пользователя
     * @return false или user_id
     */
    public static function verifyUser($verify_code)
    {
        /* Если успешно - вернет id записи */
        $args = array(
            'post_type' => 'members',
            'meta_query' => array(
                array(
                    'key' => 'verify_code',
                    'value' => trim($verify_code),
                    'compare' => '=',
                    'posts_per_page' => 1,
                )
            )
        );
        $query = new WP_Query($args);

        if ($query->post_count > 0) {
            self::setVerifyUserStatus($query->post->ID);
            return $query->post->ID;
        }

        return false;
    }


    /**
     * Устанавливает статус верификации в базе, удаляет код
     */
    public static function setVerifyUserStatus($user_id)
    {
        update_post_meta($user_id, "user_verify", "on");
        delete_post_meta($user_id, "verify_code");
    }


    /**
     * Снимает статус верификации в базе
     */
    public static function removeVerifyUserStatus($user_id)
    {
        update_post_meta($user_id, "user_verify", "off");
    }

    /*
     * Выбор одного проекта по его id
     * */
    public static function getProject($id = null,$filter = null)
    {
        global $wpdb;
        $raw_datas = null;
        $project_id = intval(trim(strip_tags($_GET['id'])));
        $user_id = $_SESSION['user_id'];
        $PROJECT_ID = $project_id;
        $USER_ID = $user_id;

        //[$USER_ID][$PROJECT_ID]

        if(!is_null($filter)) {
            if(isset($filter['new_exc'])) {
                if(is_array($filter['new_exc'])) {
                    //$new_exc = "'".implode("','", $filter['new_exc'])."'";

                    foreach ($filter['new_exc'] as $item) {
                        $kw_filter[] = "[[:<:]]".$item."[[:>:]]";
                    }

                    $like = implode('|',$kw_filter);


                } elseif (is_string($filter['new_exc']) && !empty(trim($_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['re_excluded']))) {
                    $keyword_to_exluded = explode("\n", $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['re_excluded']);
                    foreach ($keyword_to_exluded as $id => $kw_ex) {
                        if (empty($kw_ex)) {
                            unset($keyword_to_exluded[$id]);
                        } else {
                            $kw_filter[] = "[[:<:]]".$kw_ex."[[:>:]]";

                        }
                    }

                    $like = implode('|',$kw_filter);
                }

                //print_r($like);


                $like = wp_slash($like);
                /* Сразу сделаем все слова видимые, а потом уберем только минус слова */
                $query1 = "UPDATE project_keywords SET visible = 1 WHERE project_id = $project_id";
                $wpdb->query($query1);

                //$query = "UPDATE project_keywords SET visible = 0 WHERE project_id = $project_id AND keyword REGEXP '$like'";

                $q = "SELECT keyword FROM project_keywords WHERE project_id = $project_id AND keyword REGEXP '$like'";
                //echo $q;
                $keyword_to_upd = $wpdb->get_results($q);

                //print_r($keyword_to_upd);

                if(!empty($keyword_to_upd)) {
                    $k_array = array();
                    foreach ($keyword_to_upd as $item) {
                        $k_array[] = wp_slash($item->keyword);
                    }
                    $k_data = "'".implode("','",$k_array)."'";
                    $query = "UPDATE project_keywords SET visible = 0 WHERE project_id = $project_id AND keyword in ($k_data)";
                    $wpdb->query($query);
                }


            }
        }

        $results = array();
        if(!is_null($id)) {
            $query = "SELECT id, 
                        project_id, 
                        keyword, 
                        search_volume, 
                        average_cpc as average_CPC, 
                        competition, 
                        year_stats_stock_x, 
                        year_stats_stock_y ,
                        source,
                        visible
                        FROM project_keywords 
                        WHERE 1 
                        AND project_id = $project_id 
                        AND user_id = $user_id  
                        ORDER BY id ASC";

            $raw_datas = $wpdb->get_results($query);
            if(is_array($raw_datas)) {
                foreach ($raw_datas as $raw_data) {
                    if(!empty($raw_data->year_stats_stock_x)) {
                        $raw_data->year_stats_stock['x'] = unserialize($raw_data->year_stats_stock_x);
                        $raw_data->year_stats_stock['y'] = unserialize($raw_data->year_stats_stock_y);
                    }
                    $results['res'][] = $raw_data;
                }
            }

            $query = "SELECT id, title, language, currency, country, cities, keywords, excluded, included FROM projects WHERE user_id = $user_id AND id = $project_id LIMIT 1";
            $project_settings = $wpdb->get_results($query);
            if(!empty($project_settings)) {
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['target_lang'] = $project_settings[0]->language;
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['currency'] = $project_settings[0]->currency;
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['country_criteria'] = $project_settings[0]->country;
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['geo_criteria'] = unserialize($project_settings[0]->cities);
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['keywords'] = $project_settings[0]->keywords;
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['excluded'] = $project_settings[0]->excluded;
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['included'] = $project_settings[0]->included;
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['title'] = $project_settings[0]->title;
                $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_title'] = $project_settings[0]->title;
            } else {
                return false;
            }

        }
        $_SESSION['user_'.$USER_ID]['project_'.$PROJECT_ID]['project_keywords'] = $results;
        //$_SESSION['project_title'] = $results;

        //$groups_data['groups_keywords']
        $results['groups_data'] = self::getGroups($PROJECT_ID);

        return $results;
    }

    /*
     * Список всех проектов клиента
     *
     * */
    public static function getProjects($user_id = null)
    {
        $results = array();
        if(!is_null($user_id)) {
            global $wpdb;
            $query = "SELECT id, title, updated_at FROM projects WHERE user_id = $user_id ORDER BY id DESC";
            $results = $wpdb->get_results($query);

        }
        return $results;
    }

    /*
     * Выбор групп ключевых слов проекта
     * */
    public static function getGroups($project_id = null)
    {
        global $wpdb;
        $results = array();
        if(!is_null($project_id)) {
            $query = "SELECT id,project_id, title FROM project_groups WHERE project_id = $project_id ORDER BY title ASC";
            $results['groups'] = $wpdb->get_results($query);

            $query = "SELECT group_id, keywords FROM project_groups_keywords WHERE project_id = $project_id";
            $g_keywords = $wpdb->get_results($query);

            //print_r($g_keywords);

            if(is_array($g_keywords )) {
                foreach ($g_keywords  as $groups_keyword) {
                    $results['groups_keywords'][$groups_keyword->keywords] = $groups_keyword->group_id;
                }
            }
        }

        return $results;
    }

    /*
     * Выбор тарифа по его slug
     * */
    public static function getTariffBySlug($slug)
    {
        $result = new stdClass();
        if(!empty($slug)) {
            $result = get_term_by('slug',$slug,'role');
        }
        $term_custom_fields = get_term_meta( $result->term_id, '', true );
        if(is_array($term_custom_fields) && !empty($term_custom_fields)) {
            foreach ($term_custom_fields as $field => $value) {
                $result->{$field} = $value[0];
            }
        }

        return $result;
    }


    public static function changePass()
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
