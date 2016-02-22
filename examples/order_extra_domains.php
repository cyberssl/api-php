<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("production");
if(!$api->auth("your_api_key")) {echo "Authorize error";}
$api->order_extra_domains(
  array(	'order_id' => 9999 ,
    'extra_domains_nr' => 1  )
); 
print_r($api->response);