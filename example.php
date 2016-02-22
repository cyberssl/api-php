<?
require_once("cyberssl_api.class.php");

$api = new CyberSSL_api("production"); //sandbox or production
if(!$api->auth("your_api_key")) { echo "Authorize error"; }
if($api->my_orders()) { 
    print_r($api->response); 
} else { 
    echo "Error Message: " . $api->response_error_message . " Error Code: ".$api->response_error_code; 
}        