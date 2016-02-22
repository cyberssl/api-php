<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("sandbox");
if(!$api->auth("your_api_key")) {echo "Authorize error";}

/* Admin_Firstname */ $ssl_generate["admin_firstname"]="John";

/* Admin_Lastname */ $ssl_generate["admin_lastname"]="Smith";
/* Admin_Phone:  */  $ssl_generate["admin_phone"]="0042321313";

/* Admin Title: */   $ssl_generate["admin_title"]="IT manager";
/* Admin Email:*/    $ssl_generate["admin_email"]="admin@mysite.com";

/* CSR Email:"*/     $ssl_generate["csr_email"]="admin@mysite.com";
/* CSR Domain:*/     $ssl_generate["csr_domain"]="john.com";
/* Organization (ex.: Private Person)*/ $ssl_generate["csr_organization"]="John LLC";
/* CSR City */ $ssl_generate["csr_city"]="Portland";
/* CSR State*/  $ssl_generate["csr_state"]="Oregon";

/* CSR SAN, only for multi-domain product*/ // $ssl_generate["csr_san_string"]="domain1.com,domain2.com";

/* CSR Country Code (ex.: US, DE)*/  $ssl_generate["csr_country"]="US";

/* ORG varaibles only if SSL requires business validation
/* ORG Division */ $ssl_generate["org_division"]="IT";
/* ORG Adressline*/  $ssl_generate["org_addressline"]="Avenue 25";
/* ORG Country: */ $ssl_generate["org_country"]="United States";
/* ORG Phone: */ $ssl_generate["org_phone"]="+155152333";
/* ORG PostalCode:*/  $ssl_generate["org_postalcode"]="1551";
/* ORG Region: */ $ssl_generate["org_region"]="Oregon";
/* ORG Name: */ $ssl_generate["org_name"]="John LLC";
/* ORG City: */ $ssl_generate["org_city"]="Portland";           
                                                                    

$ssl_generate["period"]=1;       //1,2 or 3 years
$ssl_generate["dv_method"]="http";  // http, https, email or dns
$ssl_generate["product_id"]=17;    // ssl product id
$ssl_generate["software_id"]=2;

if($api->add_ssl_order($ssl_generate)) {
  print_r($api->response);
} else {
  echo $api->error_message;
}
