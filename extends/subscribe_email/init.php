<?php

/**
* SubscribeEmail
*/
class SubscribeEmail
{

  function __construct(){
    add_action('wp_ajax_nopriv_userSubscribe', array( $this, 'userSubscribe' ));
    add_action('wp_ajax_userSubscribe', array($this, 'userSubscribe'));

    add_action('wp_ajax_nopriv_conferenceForm', array( $this, 'conferenceForm' ));
    add_action('wp_ajax_conferenceForm', array($this, 'conferenceForm'));

    add_action('wp_ajax_nopriv_blogSubscribe', array( $this, 'blogSubscribe' ));
    add_action('wp_ajax_blogSubscribe', array($this, 'blogSubscribe'));
  }

  public static function userSubscribe(){
    // start
    $result = array();

    // get data
    $form_data = $_POST['form_data'];

    // get user data
    $user_data = array();
    parse_str($form_data, $user_data);

    $user_email = htmlspecialchars(trim($user_data["user_email"]));

    if ($user_email && $user_email != ""){
        // prepare user meta
        $user_meta_input = array(
            'user_email'    => $user_email
        );
        // prepare user fields
        $user_fields = array(
            'post_title'   => $user_email,
            'post_type'    => 'subscribe_email',
            'post_status'  => 'publish',
            'meta_input'   => $user_meta_input,
        );
        // create email
        $post_id = wp_insert_post( $user_fields );
    }

    // send result and exit
    print json_encode($result);
    exit();
  }

  public static function conferenceForm(){
    // start
    $result = array();

    // get data
    $form_data = $_POST['form_data'];

    // get user data
    $user_data = array();
    parse_str($form_data, $user_data);

    $email = htmlspecialchars(trim($user_data["email"]));
    $name = htmlspecialchars(trim($user_data["name"]));
    $company = htmlspecialchars(trim($user_data["company"]));
    $position = htmlspecialchars(trim($user_data["position"]));

    if ($email && $email != ""){
      // prepare user meta
      $user_meta_input = array(
        'email'    => $email,
        'name'    => $name,
        'company'    => $company,
        'position'    => $position,
      );
      // prepare user fields
      $user_fields = array(
        'post_title'   => $email,
        'post_type'    => 'conference_email',
        'post_status'  => 'publish',
        'meta_input'   => $user_meta_input,
      );
      // create email
      $post_id = wp_insert_post( $user_fields );

      // prepare email
      $mail = new WPS_Mail();

      $message = "
      <p>Привет!</p>
      <p>Высылаем вам материалы по Google Shopping.</p>
      <p>Конференция DNIPRO MARKETING CONFERENCE 2019</p>
      <a href='https://pengstud.com/blog/skript-google-shopping-keywords/' >Скрипт Google Shopping Keywords</a><br>
      <a href='https://pengstud.com/blog/how-to-google-shopping/' >Настройка Google Shopping</a><br>
      <a href='https://pengstud.com/blog/shopping-guide-1/' >Google Shopping от А до Я</a><br><br>
      <a href='https://drive.google.com/file/d/1hSXHl8hBTHT0AouDX_ULFC7Eg3CIvzBB/view' >Презентация Google Shopping</a><br>
      <p>Спасибо, что проявили интерес к нашей презентации!</p>
      ";

      // email_data
      $email_data['to'] = $email;
      $email_data['from'] = "pengstud.com";
      $email_data['sender'] = 'wordpress@' . wps__get_sitename();
      $email_data['subject'] = "Материалы";
      $email_data['message'] = $message;

      // send email
      $mail->send_email__smtp($email_data);
    }

    // send result and exit
    print json_encode($user_data);
    exit();
  }

  public static function blogSubscribe(){
        // start
        $result = array();

        // get data
        $form_data = $_POST['form_data'];

        // get user data
        $user_data = array();
        parse_str($form_data, $user_data);

        $email = htmlspecialchars(trim($user_data["user_email"]));
        $name = htmlspecialchars(trim($user_data["user_fio"]));

        if ($email && $email != ""){
            // prepare user meta
            $user_meta_input = array(
                'email'    => $email,
                'name'    => $name,
            );
            // prepare user fields
            $user_fields = array(
                'post_title'   => $email,
                'post_type'    => 'blog_subscribe_email',
                'post_status'  => 'publish',
                'meta_input'   => $user_meta_input,
            );
            // create email
            $post_id = wp_insert_post( $user_fields );
        }

        // send result and exit
        print json_encode($result);
        exit();
    }


}
new SubscribeEmail();
