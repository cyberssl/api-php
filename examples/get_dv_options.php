<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("sandbox");
if(!$api->auth("your_api_key")) {echo "Authorize error";}
print_r( $api->get_dv_options(
  array(	'order_id' => 9999	 ,
    'dv_method' => "email"  )
));

//all, http,https,email or dns
