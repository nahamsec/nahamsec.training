<?php

class Output {

    public static function error($json = array(), $http_code = 400) {
        header('Content-Type: application/json');
        http_response_code($http_code);
        echo (gettype($json) == 'array') ? json_encode($json) : json_encode(array($json));
        exit();
    }


    public static function success($json = array(), $http_code = 200) {
        header('Content-Type: application/json');
        http_response_code($http_code);
        echo (gettype($json) == 'array') ? json_encode($json) : json_encode(array($json));
        exit();
    }
    
}