<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("production");
if(!$api->auth("your_api_key")) {echo "Authorize error";}
print_r($api->get_ssl_product_details(3));