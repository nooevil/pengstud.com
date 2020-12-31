<?php

/**
 * Register user
 */
class UserRegister
{

    function __construct()
    {
        add_action('wp_ajax_nopriv_userRegister', array($this, 'addUser'));
        add_action('wp_ajax_userRegister', array($this, 'addUser'));
    }

    public static function addUser()
    {
        // start
        $result = array();

        // get data
        $form_data = $_POST['form_data'];

        // get user data
        $user_data = array();
        parse_str($form_data, $user_data);

        // check data on errors
        $errors = self::checkFormData($user_data);

        if (!empty($errors)) {
            $result["errors"] = $errors;
        } else {
            // get data
            $user_fio = trim($user_data["user_fio"]);
            $user_email = trim($user_data["user_email"]);
            $user_phone = trim($user_data["user_phone"]);
            $user_company = trim($user_data["user_company"]);
            $user_pass = trim($user_data["user_pass"]);
            $verify_code = md5($user_pass . $user_email . $user_fio);
            // prepare user meta
            $user_meta_input = array(
                'user_password' => password_hash($user_pass, PASSWORD_DEFAULT),
                'user_email' => $user_email,
                'user_fio' => $user_fio,
                'user_phone' => $user_phone,
                'user_company' => $user_company,
                'verify_code' => $verify_code,
            );
            // prepare user fields
            $user_fields = array(
                'post_title' => $user_fio,
                'post_type' => 'members',
                'post_status' => 'publish',
                'meta_input' => $user_meta_input,
            );
            // create user
            $post_id = wp_insert_post($user_fields);

            // update tarif data
            User::setUserTarif($post_id, '1');

            // prepare email
            $mail = new WPS_Mail();

            // message_data
            $message_data["form_template"] = "register";
            $message_data["verify_code"] = $verify_code;
            $message_data["user_email"] = $user_email;
            $message_data["user_fio"] = $user_fio;
            $message_data["user_pass"] = $user_pass;

            $message = $mail->render_message($message_data);

            // email_data
            $email_data['to'] = $user_email;
            $email_data['from'] = "pengstud.com";
            $email_data['sender'] = 'wordpress@' . wps__get_sitename();
            $email_data['subject'] = "Регистрация";
            $email_data['message'] = $message;

            // send email
            $mail->send_email__smtp($email_data);

            // send denis
            mail('dennissber@gmail.com', 'NEWREGISTER', 'Новая регистрация: ' . $user_fio);

            // result
            $result["success"] = $user_email;
        }

        // more headers
        header("Content-type: application/json; charset=UTF-8");
        header("Cache-Control: must-revalidate");
        header("Pragma: no-cache");
        header("Expires: -1");

        // send result and exit
        print json_encode($result);
        exit();
    }


    public static function checkFormData($user_data)
    {
        $errors = array();

        // fio
        if (trim($user_data["user_fio"]) == "") {
            $errors[] = "Введите ФИО";
        }

        if (iconv_strlen(trim($user_data["user_fio"])) < 5) {
            $errors[] = "Поле ФИО заполнено неверно";
        }

        // email
        if (trim($user_data["user_email"]) == "") {
            $errors[] = "Введите e-mail";
        }

        // pass
        if (trim($user_data["user_pass"]) == "") {
            $errors[] = "Введите пароль";
        }

        if (iconv_strlen(trim($user_data["user_pass"])) < 6) {
            $errors[] = "Пароль должен быть не менее 6 символов";
        }

        if (!preg_match("/([0-9]+)/", $user_data["user_pass"])) {
            $errors[] = "Пароль должен содержать минимум одну цифру";
        }

        /*Проверка на такой же емейл в базе*/
        $args = array(
            'post_type' => 'members',
            'meta_query' => array(
                array(
                    'key' => 'user_email',
                    'value' => trim($user_data['user_email']),
                    'compare' => '=',
                    'posts_per_page' => 1,
                )
            )
        );
        $query = new WP_Query($args);

        if ($query->post_count > 0) {
            $errors[] = "E-mail уже занят";
        }

        return $errors;
    }


}

new UserRegister();