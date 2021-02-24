<?php namespace Model;

class HttpResult {

    private $data;
    private $status;

    public function __construct($data, $status) {
        $this->data = $data;
        $this->status = $status;
    }


    public function getData(){
        return $this->data;
    }

    public function getJSON() {
        return json_decode($this->data, true);
    }

    public function getHttpStatus() {
        return $this->status;
    }


}

class Http {

    private $ch;
    private $headers = array();

    public function __construct($url){
        $this->ch = curl_init($url);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    public function method($method){
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, strtoupper($method) );
        return $this;
    }

    public function json($json){
        $this->headers[] = 'Content-Type: application/json';
        $this->headers[] = 'Content-Length: ' . strlen($json);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $json);
        return $this;
    }

    public function credentials($username,$password){
        curl_setopt($this->ch, CURLOPT_USERPWD, $username.':'.$password);
        curl_setopt($this->ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        return $this;
    }

    public function header($header){
        $this->headers[] = $header;
        return $this;
    }

    public function cookieStore($name){
        curl_setopt($this->ch, CURLOPT_COOKIEJAR, '/tmp/'.$name.'-cookies.txt');
        curl_setopt($this->ch, CURLOPT_COOKIEFILE, '/tmp/'.$name.'-cookies.txt');
        return $this;
    }

    public function timeout($i){
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 1 );
        return $this;
    }

    public function postfields($data){
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Content-Length: ' . strlen( http_build_query($data) )));
        return $this;
    }

    public function postJsonString($data){
        $this->headers[] = 'Content-Type: application/json';
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data );
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Content-Length: ' . strlen( $data )));
        return $this;
    }

    public function send(){
        //curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        if( $this->headers ){
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->headers);
        }
        curl_setopt($this->ch, CURLOPT_VERBOSE, 1);
        curl_setopt($this->ch, CURLOPT_HEADER, 1);
        curl_setopt($this->ch, CURLINFO_HEADER_OUT, true);
        $response = curl_exec($this->ch);
        $header_size = curl_getinfo($this->ch, CURLINFO_HEADER_SIZE);
        $body = substr($response, $header_size);
        return new HttpResult( $body, curl_getinfo($this->ch, CURLINFO_HTTP_CODE) );
    }


    /**
     * @param $url
     * @param array $headers
     * @return bool|array
     */
    public static function getJson($url, $headers=array()){
        $send_headers = array();
        if( gettype($headers) == 'array' ){
            foreach( $headers as $h ){
                $send_headers[] = $h;
            }
        }
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        if( $send_headers ) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $send_headers);
        }
        $result = curl_exec($ch);
        $data = json_decode( $result ,true);
        return ( gettype($data) == 'array' ) ? $data : false;
    }


    /**
     * @param $url
     * @param array $headers
     * @return bool|array
     */
    public static function get($url, $headers=array()){
        $send_headers = array();
        if( gettype($headers) == 'array' ){
            foreach( $headers as $h ){
                $send_headers[] = $h;
            }
        }
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        if( $send_headers ) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $send_headers);
        }
        $result = curl_exec($ch);
        return $result;
    }


    public static function postXML($url,$data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $content=curl_exec($ch);
        try{
            $xml = new \SimpleXMLElement($content);
            return $xml;
        }catch (\Exception $e){
            return false;
        }
    }



    public static function postJson($url, $postdata,$headers=array())
    {
        $ch = curl_init($url);
        $send_headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postdata)
        );
        if( gettype($headers) == 'array' ){
            foreach( $headers as $h ){
                $send_headers[] = $h;
            }
        }
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $send_headers);
        $result = curl_exec($ch);
        $data = json_decode( $result ,true);
        return ( gettype($data) == 'array' ) ? $data : false;
    }


    public static function post($url,$data, $content_type='application/json')
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: '.$content_type,'Content-Length: ' . strlen( http_build_query($data) )));
        return curl_exec($ch);
    }


}