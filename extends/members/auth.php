<?php

/**
* Auth user
*/
class UserAuth{

  function __construct(){
    add_action('wp_ajax_nopriv_userLogin', array( $this, 'userLogin' ));
    add_action('wp_ajax_userLogin', array($this, 'userLogin'));
  }


  public static function userLogin(){
    // start
    $result = array();

    // get data
    $form_data = $_POST['form_data'];

    // get user data
    $user_data = array();
    parse_str($form_data, $user_data);

    // check data on errors
    $errors = $this->checkFormData($user_data);

    if ( !empty($errors) ){
      $result["errors"] = $errors;
    } else {
      // get data
      $user_email   = trim($user_data["user_email"]);
      $user_pass    = trim($user_data["user_pass"]);
      $save_me      = trim($user_data["save_me"]);

      $result_auth = self::userAuth($user_email, $user_pass, $save_me);
      if ($result_auth){
        $result["success"] = "true";
      } else {
        $result["errors"][] = "E-mail или пароль неверный";
      }
    }

    // send result and exit
    print json_encode($result);
    exit();
  }


  public static function userAuth($email, $password, $save_me) {
    $result = false;

    $args = array(
      'post_type' => 'members',
      'meta_query' => array(
        array(
          'key' => 'user_email',
          'value' => $email,
          'compare' => '=',
          'posts_per_page' => 1,
        )
      )
    );
    $query = new WP_Query($args);

    if($query->post_count > 0) {
      $user_pass = get_post_meta($query->post->ID,'user_password', true);
      if (password_verify($password, $user_pass)) {
        $_SESSION['user_id'] = $query->post->ID;
        $result = true;
        // если "запомнить меня" - ставим куку
        if ($save_me === '1') {
          self::addSaveUserCoockie($query->post->ID);
        }
      }
    }
    return $result;
  }


  public static function addSaveUserCoockie($user_id)
  {
    $encrypted_id = self::encrypt_decrypt('encrypt', $user_id);
    setcookie( "penguin_auth", json_encode($encrypted_id), time()+3600*24*30, '/', "");
    return true;
  }
 

  public static function checkFormData($user_data){
    $errors = array();

    // email
    if (trim($user_data["user_email"]) == ""){
      $errors[] = "Введите e-mail";
    }

    // pass
    if (trim($user_data["user_pass"]) == ""){
      $errors[] = "Введите пароль";
    }

    return $errors;
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


  /* password */
  public static function rememberPass(){

    if(isset($_POST['remember_pass'])) {
        unset($_SESSION['wrong_email']);
        unset($_SESSION['code_send']);

        if(isset($_POST['remember_email'])) {
            $args = array(
                'post_type' => 'members',
                'meta_query' => array(
                    array(
                        'key' => 'user_email',
                        'value' => trim(strip_tags($_POST['remember_email'])),
                        'compare' => '=',
                        'posts_per_page' => 1,
                    )
                )
            );
            $query = new WP_Query($args);

            if($query->post_count > 0) {
                $user = $query->post;
                $user_pass = substr(md5(date('Y-m-d H:i:s').$_POST['remember_email'].rand(1,666)),0,7);

                // update user pass
                $user_pass_hash = password_hash($user_pass, PASSWORD_DEFAULT);
                update_post_meta($user->ID, 'user_password', $user_pass_hash);

                // prepare email
                $mail = new WPS_Mail();

                // message_data
                $message_data["form_template"] = "remember_password";
                $message_data["user_pass"]     = $user_pass;

                $message = $mail->render_message($message_data);

                // email_data
                $email_data['to']      = $_POST['remember_email'];
                $email_data['from']    = "pengstud.com";
                $email_data['sender']  = 'wordpress@' . wps__get_sitename();
                $email_data['subject'] = "Восстановление пароля";
                $email_data['message'] = $message;

                // send email
                $mail->send_email__smtp($email_data);

                // exit
                $_SESSION['code_send'] = true;
            } else {
                $_SESSION['wrong_email'] = true;
            }
        }
    }
  }


}

new UserAuth();