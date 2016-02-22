<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api( "sandbox" );
if (!$api->auth( "your_api_key" )) {
    echo "Authorize error";
}
if ($api->change_dv_method(
    array( 'order_id'  => 9999,
           'dv_method' => "https" )
)
) {
    print_r( $api->response );
} else {
    echo "error:" . $api->error_message;
}
