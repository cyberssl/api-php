<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("sandbox");
if(!$api->auth("your_api_key")) {echo "Authorize error";}

/* CSR Email(optional):"*/     $ssl_generate["csr_email"]="admin@domain1.com";
/* CSR Domain:*/     $ssl_generate["csr_domain"]="domain1.com";
/* CSR Department (optional):"*/  $ssl_generate["csr_department"]="IT department";
/* Organization (ex.: Private Person)*/ $ssl_generate["csr_organization"]="John LLC";
/* CSR City */ $ssl_generate["csr_city"]="Portland";
/* CSR State*/  $ssl_generate["csr_state"]="Oregon";
/* CSR Country Code (ex.: US, DE)*/  $ssl_generate["csr_country"]="US";
/* CSR Additional Domains (San String) */  //$ssl_generate["csr_san_string"]="domain2.com,domain3.com";

$ssl_generate["dv_method"]="dns";  // http, https, email or dns
$ssl_generate["order_id"]="9999";
$ssl_generate["software_id"]=3;
$ssl_generate["dv_method"]="email=admin@domain1.com";
if($api->reissue_ssl_order($ssl_generate)) { print_r($api->response); } else { echo "error:".$api->error_message;  }
print_r($api->order_status($api->response["order_id"]));