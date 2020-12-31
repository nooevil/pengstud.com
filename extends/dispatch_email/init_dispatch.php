<?php

/**
 * DispatchEmail
 */
class DispatchEmail
{

    function __construct()
    {
        add_action('wp_ajax_nopriv_userDispatch', array($this, 'userDispatch'));
        add_action('wp_ajax_userDispatch', array($this, 'userDispatch'));
    }

    public static function userDispatch()
    {
        // start
        $result = array();

        // get data
        $form_data = $_POST['form_data'];

        // get user data
        $user_data = array();
        parse_str($form_data, $user_data);

        $post_name = htmlspecialchars(trim($user_data["post_name"]));
        $post_b = htmlspecialchars(trim($user_data["post_b"]));
        $user_fio = htmlspecialchars(trim($user_data["user_fio"]));
        $user_company = htmlspecialchars(trim($user_data["user_company"]));
        $user_position = htmlspecialchars(trim($user_data["user_position"]));
        $user_country = htmlspecialchars(trim($user_data["user_country"]));
        $user_phone = htmlspecialchars(trim($user_data["user_phone"]));
        $user_email = htmlspecialchars(trim($user_data["user_email"]));
		$sendpulse_book = htmlspecialchars(trim($user_data["sendpulse_book_name"]));

        if(isset($user_data['big_form'])) {
            $group = 'Расширенная форма';
        } else {
            $group = 'Обычная форма';
        }

        //pre_print_r($user_data);

        if ($user_email && $user_email != "") {
            // prepare user meta
            $user_meta_input = array(
                'user_fio' => $user_fio,
                'user_company' => $user_company,
                'user_position' => $user_position,
                'user_country' => $user_country,
                'user_phone' => $user_phone,
                'user_email' => $user_email,
                'post_name' => $post_name
            );
            // prepare user fields
            $user_fields = array(
                'post_title' => $post_name,
                'post_type' => 'dispatch_email',
                'post_status' => 'publish',
                'meta_input' => $user_meta_input,
            );
            // create user
            $post_id = wp_insert_post($user_fields);


            $contact = new StdClass();
            $entity = new StdClass();

            $contact->firstName = $user_fio;
            $contact->lastName = $user_fio;
            $contact->channels = array(
                array('type'=>'email','value'=>$user_email),
                array('type'=>'sms', 'value' => $user_phone)
            );

            $entity->contact = $contact;
            $entity->dedupeOn = 'email';
            $entity->formType = 'user_subscribe';
            $entity->groups = array($group);
			$entity->sendpulseBook = $sendpulse_book;
            subscribeContact($entity);

        }

        // send result and exit
        print json_encode($result);
        exit();
    }

}

new DispatchEmail();