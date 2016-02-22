<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("sandbox");
if(!$api->auth("your_api_key")) {echo "Authorize error";}

/* Admin_Firstname */ $ssl_generate["admin_firstname"]="John";

/* Admin_Lastname */ $ssl_generate["admin_lastname"]="Smith";
/* Admin_Phone:  */  $ssl_generate["admin_phone"]="0042321313";

/* Admin Title: */   $ssl_generate["admin_title"]="IT manager";
/* Admin Email:*/    $ssl_generate["admin_email"]="admin@mysite.com";

$ssl_generate["csr"] = "-----BEGIN CERTIFICATE REQUEST-----
MIICyjCCAbICAQAwgYQxCzAJBgNVBAYTAkVTMQ8wDQYDVQQIDAZPcmVnb24xDzAN
BgNVBAcMBk9yZWdvbjEMMAoGA1UECgwDb3JnMRMwEQYDVQQLDApkZXBhcnRtZW50
MRMwEQYDVQQDDApteXNpdGUuY29tMRswGQYJKoZIhvcNAQkBFgx0ZXN0V0VAb2Uu
bWQwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC/h2rlCroHNgSY9e3U
A49SWkijWxqlAnQUOIQn1EiWecHmJj1NNH0gM22222222222222222a4Gna/hDFU
X1Ib1DHKf17ruquJKp71MM9XFdMM5iyyIvFRx5tuQhe+DkgvRnmZVtVMuS1/CzfV
4W6sAKJfSkMLR7efZTrCubXL/iVWIYtf+K3JC0p42XUtAbseqL+qkzBL1Ncp8Yaa
gRCIxqsgdrDo7kqn/HIg73cM+urTZkRowY+q+Tj63IrPD1rTqkLpbmvFa3vV0mU6
+bCzAgMBAAGgADANBgkqhkiG9w0BAQsFAAOCAQEAMyGBxiX9TFgJTNIYrM9pTSfX
UI8tNAuyXxjCU3tER8hexxwpTrq4PXoZhelD9YIwwH/f/4vAeuD9furyBwpGgVb3
eYgXyzk7YhMdn/8CEmlh4XwBBX5iYZrUqa11111111vZOyp7W7KQRZiUP0X0F0eA
P7hVTWHWeUP0DXZ3v2bPlO2yL/JnfRF47W84EYoUR37LyoY8uej6cY47xZ4lAicT
Wh1ugSoskaN/0L7u03Lk3jDeut/1YGjQAp5ZKq1ppFWLabCYkI34ncbP2UtPqsql
A+Xsn1+9MUVUFwnVQeU4Cy/OmyQc+gptFln6RxSUShPzzx5O2OGg1uiRllSSJA==
-----END CERTIFICATE REQUEST-----";

$ssl_generate["period"]=1;       //1,2 or 3 years
$ssl_generate["dv_method"]="email:admin@mysite.com";  // http, https, email or dns
$ssl_generate["product_id"]=17;    // ssl product id
$ssl_generate["software_id"]=2;;   // software_id
$ssl_generate["admin_title"]='IT Manager';

if($api->add_ssl_order($ssl_generate)) {
    print_r($api->response);
} else {
    echo $api->error_message;
}
