<?php

/**
 * CyberSSL API
 *
 * @version 1.15
 **/
/*Hack for old php versions to use boolval() */
if(!function_exists('boolval')) {
    function boolval($val) {
        return (bool) $val;
    }
}
class CyberSSL_api
{
    protected $api_url;
    protected $token;
    public $response_success;
    public $response;
    public $error_code;
    public $error_message;
    /**
     * CyberSSL_api constructor.
     *
     * @param $api_type
     */
    public function __construct($api_type)
    {
        if ($api_type == "production") {
            $this->api_url = 'https://api.cyberssl.com/v1/';
        }
        if ($api_type == "sandbox") {
            $this->api_url = 'https://api.cyberssl.com/sandbox/v1/';
        }
    }

    /**
     * @param $api_key
     *
     * @return boolean
     */
    public function auth($api_key)
    {
        $this->call( 'auth', "GET", array(
            'apikey' => $api_key

        ) );
        if ($this->response["success"]) {
            $this->token = $this->response["token"];
        }

        return $this->response["success"];
    }

    /**
     * @return mixed
     */
    public function list_products()
    {
        $this->call( 'list_products', "GET", array(
            'token' => $this->token
        ) );
        if ($this->response_success) {
            return $this->response["ssl_products"];
        }

        return false;
    }

    /**
     * @param $product_id
     *
     * @return array|boolean
     */
    public function get_ssl_product_details($product_id)
    {
        $this->call( 'get_ssl_product_details', "GET", array(
            'product_id' => $product_id,
            'token'      => $this->token
        ) );
        if ($this->response_success) {
            return $this->response["product"];
        }

        return false;
    }

    /**
     * @return array,bool
     */
    public function my_ssl_orders()
    {
        $this->call( 'my_orders', "GET", array(
            'token' => $this->token
        ) );
        if ($this->response_success) {
            return $this->response["ssl_orders"];
        }

        return false;
    }

    /**
     * @param $array
     *
     * @return boolean
     */
    public function add_ssl_order($array)
    {
        return $this->call( 'add_ssl_order', "POST", array_merge( array(
            'token' => $this->token
        ), $array ) );
    }

    /**
     * @param $array
     *
     * @return boolean
     */
    public function validate_csr($array)
    {
        return $this->call( 'validate_csr', "POST", array_merge( array(
            'token' => $this->token
        ), $array ) );
    }

    /**
     * @param $array
     *
     * @return array|boolean
     */
    public function get_dv_options_csr($array)
    {
        $this->call( 'get_dv_options_csr', "POST", array_merge( array(
            'token' => $this->token
        ), $array ) );
        if ($this->response_success) {
            return $this->response["dv_options"];
        }

        return false;
    }

    /**
     * @param $array
     *
     * @return boolean
     */
    public function reissue_ssl_order($array)
    {
        return $this->call( 'reissue_ssl_order', "POST", array_merge( array(
            'token' => $this->token
        ), $array ) );
    }

    /**
     * @param $array
     *
     * @return boolean
     */
    public function activate_ssl_order($array)
    {
        return $this->call( 'activate_ssl_order', "POST", array_merge( array(
            'token' => $this->token
        ), $array ) );
    }

    /**
     * @return array|boolean
     */
    public function get_ssl_web_soft()
    {
        $this->call( 'get_ssl_web_soft', "GET", array(
            'token' => $this->token,
        ) );
        if ($this->response_success) {
            return $this->response["webservers"];
        }

        return false;
    }

    /**
     * @param $array
     *
     * @return array|bool
     */
    public function get_dv_options($array)
    {
        $this->call( 'get_dv_options', "GET", array_merge( array(
            'token' => $this->token
        ), $array ) );
        if ($this->response_success) {
            return $this->response["dv_options"];
        }

        return false;
    }

    /**
     * @param $array
     *
     * @return boolean
     */
    public function change_dv_method($array)
    {
        return $this->call( 'change_dv_method', "POST", array_merge( array(
            'token' => $this->token
        ), $array ) );
    }

    /**
     * @param $order_id
     *
     * @return array|bool
     */
    public function order_status($order_id)
    {
        $this->call( 'order_status', "GET", array(
            'token'    => $this->token,
            'order_id' => $order_id,
        ) );
        if ($this->response_success) {
            return $this->response["order"];
        }

        return false;
    }

    /**
     * @param $array
     *
     * @return float|bool
     */
    public function get_ssl_product_price($array)
    {
        $this->call( 'get_ssl_product_price', "GET", array_merge( array(
            'token' => $this->token
        ), $array ) );
        if ($this->response_success) {
            return floatval($this->response["amount"]);
        }

        return false;
    }

    /**
     * @param $array
     *
     * @return boolean
     */
    public function order_extra_domains($array)
    {
        return $this->call( 'order_extra_domains', "POST", array_merge( array(
            'token' => $this->token
        ), $array ) );
    }

    /**
     * @return bool|float
     */
    public function get_balance()
    {
        $this->call( 'get_balance', "GET", array(
            'token' => $this->token
        ) );
        if ($this->response_success) {
            return floatval($this->response["balance"]);
        }

        return false;
    }

    /**
     * @param $order_id
     *
     * @return boolean
     */
    public function resend_dv_email($order_id)
    {
        return $this->call( 'resend_dv_email', "GET", array(
            'token'    => $this->token,
            'order_id' => $order_id
        ) );
    }

    /**
     * @param       $uri
     * @param       $data_type
     * @param array $data
     *
     * @return boolean
     */
    protected function call($uri, $data_type, $data = array())
    {
        $url = $this->api_url . $uri;
        if (!empty ($data) && $data_type == "GET") {
            foreach ($data as $key => $value) {
                $url .= (strpos( $url, '?' ) !== false ? '&' : '?') . urlencode( $key ) . '=' . rawurlencode( $value );
            }
        }

        $post = !empty ($data) && ($data_type == 'POST') ? true : false;
        $c = curl_init( $url );
        if ($post) {
            curl_setopt( $c, CURLOPT_POST, true );
        }

        if (!empty ($data) && ($data_type == 'POST')) {
            $queryData = http_build_query( $data );
            curl_setopt( $c, CURLOPT_POSTFIELDS, $queryData );
        }

        curl_setopt( $c, CURLOPT_CONNECTTIMEOUT, 10 );
        curl_setopt( $c, CURLOPT_TIMEOUT, 60 );
        curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $c, CURLOPT_SSL_VERIFYPEER, true );

        $result = curl_exec( $c );
        //$status = curl_getinfo( $c, CURLINFO_HTTP_CODE );

        curl_close( $c );
        $result_decode = json_decode( $result, true );
        $this->response_success = boolval($result_decode["success"]);
        if (@$result_decode["error_code"]) {
            $this->error_code = $result_decode["error_code"];
        }
        if (@$result_decode["error_message"]) {
            $this->error_message = $result_decode["error_message"];
        }
        $this->response = $result_decode;

        return boolval($this->response["success"]);
    }

}


