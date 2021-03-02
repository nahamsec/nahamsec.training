<?php


namespace Controller;


class SSRF
{

    private static $errorMsg = '';
    public static function storeError($msg){
        $msg = trim(explode('failed to open stream:',$msg)[1]);
        self::$errorMsg = $msg;
    }


    public static function lesson6(){
        $data = array(
            'error'     =>  false,
            'source'    =>  false,
        );
        if( isset($_POST["url"]) ){
            ini_set('default_socket_timeout', 2);
            $url_sp = explode("/",$_POST["url"]);
            $continue = true;
            if( substr($_POST["url"],0,7) == 'http://' || substr($_POST["url"],0,8) == 'https://' ){
                if( $url_sp[2] == 'localhost' || $url_sp[2] == 'nahamsec.training' || $url_sp[2] == '169.254.169.254' || $url_sp[2] == '142.93.35.49' || substr($url_sp[2],0,4) == '127.' ){
                    $continue = false;
                    $data["error"] = 'Only remote URLs are allowed';
                }
            }else{
                $continue = false;
                $data["error"] = 'URL must start with http:// or https://';
            }
            if( $continue ) {
                set_error_handler(function ($e, $f) {
                    SSRF::storeError($f);
                });
                if ($getdata = file_get_contents($_POST["url"])) {
                    $data["source"] = $getdata;
                } else {
                    $data["source"] = self::$errorMsg;
                }
            }
        }
        \View::page('ssrf/lesson4',$data);
    }

    public static function lesson5(){
        $data = array(
            'error'     =>  false
        );
        if( isset($_POST["url"]) ){
            ini_set('default_socket_timeout', 1);
            $url_sp = explode("/",$_POST["url"]);
            $continue = true;
            if( substr($_POST["url"],0,7) == 'http://' || substr($_POST["url"],0,8) == 'https://' ){
                if( $url_sp[2] == 'localhost' || $url_sp[2] == 'nahamsec.training' || $url_sp[2] == '142.93.35.49' || substr($url_sp[2],0,4) == '127.' ){
                    $continue = false;
                    $data["error"] = 'Only remote URLs are allowed';
                }
            }else{
                $continue = false;
                $data["error"] = 'URL must start with http:// or https://';
            }
            if( $continue ) {
                set_error_handler(function ($e, $f) {
                    SSRF::storeError($f);
                });
                if ($getdata = file_get_contents($_POST["url"])) {
                    $data["source"] = 'Website Is Up';
                } else {
                    $error = self::$errorMsg;
                    if( strstr($error,'php_network_getaddresses') ){
                        $data["source"] = 'Invalid remote host';
                    }elseif( strstr($error,'HTTP request failed!')){
                        $data["source"] = 'Invalid HTTP response';
                    }else{
                        $data["source"] = 'Request Failed';
                    }
                }
            }
        }
        \View::page('ssrf/lesson5',$data);
    }

    public static function lesson4(){
        $data = array(
            'error'     =>  false,
            'source'    =>  ''
        );
        if( isset($_POST["url"]) ){
            $continue = true;
            if( substr($_POST["url"],0,7) == 'http://' || substr($_POST["url"],0,8) == 'https://' ){
                $url_sp = explode("/",$_POST["url"]);
                if( $url_sp[2] == 'nahamsec.training' || substr($url_sp[2],-18,18) == '.nahamsec.training' ){
                }else{
                    $continue = false;
                    $data["error"] = 'Only URLs from the nahamsec.training domain are allowed!';
                }
            }else{
                $continue = false;
                $data["error"] = 'URL must start with http:// or https://';
            }
            if( $continue ) {
                $ch = curl_init($_POST["url"]);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $data["source"] = curl_exec($ch);
            }
        }
        \View::page('ssrf/lesson4',$data);
    }

    public static function lesson3(){
        $data = array(
            'source'    =>  ''
        );
        if( isset($_POST["url"]) ){
            $url_sp = explode("/",$_POST["url"]);
            if( substr($url_sp[2],-6,6) == ':10000' ) {
                sleep(4);
                $data["source"] = 'Timeout Error';
            }else {
                set_error_handler(function ($e, $f) {
                    SSRF::storeError($f);
                });
                if ($getdata = file_get_contents($_POST["url"])) {
                    $data["source"] = $getdata;
                } else {
                    $data["source"] = self::$errorMsg;
                }
            }
        }
        \View::page('ssrf/lesson3',$data);
    }


    public static function lesson2(){
        $data = array(
            'file'    =>  false
        );
        if( isset($_POST["url"]) ){
            $file = md5( date("U").rand().print_r($_POST,true).print_r($_SERVER,true) ).'.jpg';
            $file_dst = getcwd().'/screenshots/'.$file;
            system('google-chrome-stable --headless --disable-gpu --no-sandbox --screenshot='.$file_dst.' '.$_POST["url"] );
            $data["file"] = $file;
        }
        \View::page('ssrf/lesson2',$data);
    }

    public static function lesson7(){
        $data = array(
            'error' =>  false
        );
        if( isset($_POST["url"]) ){
            if (filter_var($_POST["url"], FILTER_VALIDATE_URL)) {
                $url = escapeshellarg($_POST["url"]);
                $pdf = md5(microtime().rand().print_r($_SERVER,true));
                system("google-chrome-stable --headless --disable-gpu --print-to-pdf=screenshots/".$pdf.".pdf ".$url);
                \View::redirect('/screenshots/'.$pdf.'.pdf');
            } else {
                $data["error"] = 'The URL entered is invalid';
            }
        }
        \View::page('ssrf/lesson7');
    }

    public static function lesson1(){
        $data = array(
            'source'    =>  ''
        );
        if( isset($_POST["url"]) ){
            $ch = curl_init($_POST["url"]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $data["source"] = curl_exec($ch);
        }
        \View::page('ssrf/lesson1',$data);
    }
}
