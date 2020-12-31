<?php
require_once( trailingslashit( CHILD_DIR ) . 'extends/fondy/autoload.php' );
require_once( trailingslashit( CHILD_DIR ) . 'extends/fondy/Ipsp/Signature.php' );
use Ipsp\Signature;
define('MERCHANT_ID' , '1408634');
define('MERCHANT_PASSWORD' , '3cwxbO0XdHgAbYOI13HEZiIOLlgvGibG');
define('IPSP_GATEWAY' ,  'api.fondy.eu');
class Payment
{
    public $ipsp = '';
    public static $promocode = null;
    public static $today;
    public static $today_gmt;
    public function __construct($data = null)
    {
        # import Signature class from namespace


        //Здесь происходит проверка после колбека, обязательно исправить!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $client = new Ipsp_Client( MERCHANT_ID , MERCHANT_PASSWORD, IPSP_GATEWAY );
        $this->ipsp   = new Ipsp_Api( $client );
        //file_put_contents('api_call.txt',print_r($_POST,true));

    }

    public static function getForm($data, $param = null,$redirect = 'thanks',$user_data = null ) {
        $user_info = User::getUserData($_SESSION['user_id']);

        $price = intval($data->price);

        $params = array(
            'order_id'     => $user_info->post_title."_".date('d-m-Y:H:i:s'),
            'merchant_id'  => MERCHANT_ID,
            'order_desc'   => 'Оплата тарифа: '.$data->name,
            'sender_email' => $user_info->user_email,
            'currency'     => 'USD',
            'amount'       => intval($price).'00',
            'response_url' => get_site_url().'/'.$redirect.$param,
            'server_callback_url' => get_site_url() . '/'.$redirect.$param,
            'merchant_data' => $user_data['tariff_slug'].";;;".$user_data['user_id']
        );
        /*'server_callback_url' => get_site_url().'/wp-content/themes/touch/extends/Cron.php?l=96d83285941b37dd467e22873a01656d',*/
        Signature::merchant(MERCHANT_ID);
        Signature::password(MERCHANT_PASSWORD);
        $params = Signature::sign($params);
        return $params;
    }

    public static function checkPayment($data = array()) {

        Signature::merchant(MERCHANT_ID);
        Signature::password(MERCHANT_PASSWORD);
        if(Signature::check($data)) {
            if($data['response_status'] == 'success' && $data['order_status'] == 'approved') {
                $merchant_data = explode(';;;',$data['merchant_data']);

                User::setUserTarif($merchant_data[1],(string)$merchant_data[0]);
                //setUserTarif2(intval($merchant_data[1]),(string)$merchant_data[0]);
            }
        }
    }
}
$payment = new Payment($_SESSION);

