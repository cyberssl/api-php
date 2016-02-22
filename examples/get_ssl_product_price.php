<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("sandbox");
if(!$api->auth("your_api_key")) {echo "Authorize error";}
$amount=$api->get_ssl_product_price(
  array(	'period' => 1 ,
    'product_id' => 17  )
); 
echo "Amount:".$amount;