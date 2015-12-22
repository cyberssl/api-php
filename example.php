<?
require_once("cyberssl_api.class.php");

$api = new CyberSSL_api("production"); //use sandbox or production
if(!$api->auth("your_api_key")) {echo "Authorize error";}
if($api->my_orders()) { print_r($api->response); } else { echo "Message: "; echo $api->response_error_message; echo " Code:"; echo $api->response_error_code; }        