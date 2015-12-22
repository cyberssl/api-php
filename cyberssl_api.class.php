<?php   

/**
 * CyberSSL API 
 *
 * @version 1.15
 **/

class CyberSSL_api {
	protected $api_url = 'https://api.cyberssl.com/sandbox/v1/'; 
	protected $token;
  public $response_success;
  public $response;
  public $response_error_code;
  public $response_error_message;
  
  public function __construct($api_type) {
   if($api_type=="production") {  $this->api_url='https://api.cyberssl.com/v1/';   }      
	}
	public function auth($api_key) {
		$this->call ('auth', "GET", array (
				'apikey' => $api_key
		) );
    
		if($this->response["success"]===true) { $this->token=$this->response["token"]; } 
		return $this->response["success"];
	}
  public function list_products()
  {
    return $this->call ('list_products', "GET", array (
				'token' => $this->token
		) );
  }
  public function my_orders()
  {
    return $this->call ('my_orders', "GET", array (
				'token' => $this->token
		) );
  }
	public function add_ssl_order($array)
  {
      return $this->call ('add_ssl_order', "POST", array_merge(array (
		  		'token' => $this->token                       
	     	), $array) );
  }   
  
  public function reissue_ssl_order($array)
  {
      return $this->call ('reissue_ssl_order', "POST", array_merge(array (
		  		'token' => $this->token                       
	     	), $array) );
  }     
   public function activate_ssl_order($array)
  {
      return $this->call ('activate_ssl_order', "POST", array_merge(array (
		  		'token' => $this->token                       
	     	), $array) );
  } 
  public function get_ssl_web_soft($array)
  {
      return $this->call ('get_ssl_web_soft', "GET", array_merge(array (
		  		'token' => $this->token                       
	     	), $array) );
  }    
  public function get_dv_options($array)
  {
      return $this->call ('get_dv_options', "GET", array_merge(array (
		  		'token' => $this->token                       
	     	), $array) );
  }  
  public function change_validation_method($array)
  {
      return $this->call ('change_validation_method', "POST", array_merge(array (
		  		'token' => $this->token                       
	     	), $array) );
  }    
  public function order_status($order_id)
  {
      return $this->call ('order_status', "GET", array (
		  		'token' => $this->token,
          'order_id' => $order_id,                      
	     	) );
  }  
   public function get_product_price($array)
  {
      return $this->call ('get_product_price', "GET", array_merge(array (
		  		'token' => $this->token                       
	     	), $array) );
  }  
   public function get_balance()
  {   
      return $this->call ('get_balance', "GET", array (
		  		'token' => $this->token                       
	     	) );
  }  
 
	protected function call($uri, $data_type, $data = array()) {
	
		$url = $this->api_url . $uri;
		if (! empty ( $data ) && $data_type=="GET") {
			foreach ( $data as $key => $value ) {
				$url .= (strpos ( $url, '?' ) !== false ? '&' : '?') . urlencode ( $key ) . '=' . rawurlencode ( $value );
			}
		}
	
		$post = ! empty ( $data) && ($data_type=='POST' ) ? true : false;
		$c = curl_init ( $url );
		if ($post) {
			curl_setopt ( $c, CURLOPT_POST, true );
		}
		
		$queryData = '';
		if (! empty ( $data ) && ($data_type=='POST' )) {
			$queryData = http_build_query ( $data );
			curl_setopt ( $c, CURLOPT_POSTFIELDS, $queryData );
		}
		
    curl_setopt($c, CURLOPT_CONNECTTIMEOUT ,10); 
    curl_setopt($c, CURLOPT_TIMEOUT, 60); 
		curl_setopt ( $c, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $c, CURLOPT_SSL_VERIFYPEER, true );
		
		$result = curl_exec ( $c );
		

		$status = curl_getinfo ( $c, CURLINFO_HTTP_CODE );
    
		curl_close ( $c );
		$result_decode=json_decode ( $result, true );     
    $this->response_success=$result_decode["success"];
    if(@$result_decode["error_code"]) { $this->response_error_code=$result_decode["error_code"]; } 
    if(@$result_decode["error_message"]) { $this->response_error_message=$result_decode["error_message"]; }
    $this->response=$result_decode;  
    return $this->response["success"];
	}                                             

}

