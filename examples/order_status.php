<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("sandbox");
if(!$api->auth("your_api_key")) {echo "Auth Error"; }
print_r($api->order_status(9999));
