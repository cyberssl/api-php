<?
require_once("../cyberssl_api.class.php");
$api = new CyberSSL_api("sandbox");
if(!$api->auth("your_api_key")) {echo "Authorize error";}
$csr="-----BEGIN CERTIFICATE REQUEST-----
MIIC2DCCAcACAQAwgZIxCzAJBgNVBAYTAkJTMQ0wCwYDVQQIDAR05555550wCwYD
VQQHDAR0ZXN0MRowGAYDVQQKDBF0ZXN0IG9yZ2FuaXphdGlvbjEPMA0GA1UECwwG
aXQgZGVwMREwDwYDVQQDDAh0ZXN0LmNvbTElMCMGCSqGSIb3DQEJARYWeDdpbmRp
Z281NTE1QGdtYWlsLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEB
AKfOw0C5YpcDQpe47vccbzyzIXu6pmg1+Nvltvnmwvubc/0O6vsPOo0Hl1k5t7Kp
t5kSxvUIMJUDGToKrc+OX4WEHfcU4hiXubuPB4bL2/P3YTNTlli1N/qCzB5W8Tv1
xpeDvg7w4bFpLga6Fj7HWoiXc4pVpi1ON35uucdeqrIxMDkPpaC6sFXB7ZeIOM2m
qZGVKu5BQaF5AkuwjIxFzM39wVU9UtvGefuIAphZmpJe/34jzF7bUNjdc6q5Mnqp
N4ycGvo35zkXXSbUwxih7BmQ04RmIeh2jnUSL1LWxnkkm7wFiT5waMHv8/DEfDMw
ZruXHQR+hOTTIwy/hZQ3i7ECAwEAAaAAMA0GCSqGSIb3DQEBBAUAA4IBAQBuNbDt
dzpu5c3jISbGZBW8WJqHs0H7MLynq8ZwUfOAWVyxD19Gw+Do/roIbcy2Jsv+ytgZ
Pq2XAR3SXo4bv1o5bsqaZW3n3e8YeTT21GsbnEnm3Ylkd7T6oPftrJCy5MnA8zMG
Cbx7990qHaCi6REsDeVXrEjAPIMhiUw/vbf6k84Z3YGHh3tRFTkhTRcQqbvknWAt
x2zao5lVXCnz86LKTHGTiM08fCqathCd67PcQI4I+mKdZevD/nzH16t8Y54OWA55
N7zAjGX5TIBNMCGHgWXAFaaaaaaaaaaaaE2ajAymoJBoc8c12jgln2zUxgCQFrd7
ufZeSBIHI92N8u6x
-----END CERTIFICATE REQUEST-----";
$api->validate_csr(array (
		  		'csr' => $csr,
          'product_id' => 6          
	     	));
        
print_r($api->response);
