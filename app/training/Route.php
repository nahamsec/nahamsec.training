<?php

class Route
{

    protected static $routes = array();
    private static $page404 = '404';

    public static function set404($str){
        self::$page404 = $str;
    }

    /**
     * @param $http_verb - The HTTP Verb for the route
     * @param $page - The page URL segment to match
     * @param $func - The function to execute when the route is matched
     * @param bool $regex - Whether or not $page is in the form of a regex
     */
    public static function add( $http_verb, $page, $func )
    {

        if (gettype($page) == 'array') {
            foreach ($page as $i => $p) {
                $page[$i] = self::makeRegex($p);
            }
        } else {
            $page = self::makeRegex($page);
        }


        $http_verb = ( gettype($http_verb) == 'array' ) ? $http_verb : array($http_verb);
        foreach( $http_verb AS $verb ) {
            if (!isset(self::$routes[$verb])) {
                self::$routes[$verb] = array();
            }
            if ( gettype($page) == 'array' ) {
                foreach ( $page as $p ) {
                    self::$routes[$verb][] = array(
                        'regex' => $p,
                        'function' => $func
                    );
                }
            } else {
                self::$routes[$verb][] = array(
                    'regex' => $page,
                    'function' => $func
                );
            }
        }
    }

    /**
     * @param $str String - The URL segment to make a regex for
     * @return String
     */
    private static function makeRegex($str) {
        $str = str_replace('[string]', '([0-9a-zA-Z\-]{1,})', $str);
        $str = str_replace('[int]', '([0-9]{1,})', $str);
        $str = str_replace('[hash]', '([0-9a-fA-F]{32})', $str);
        $str = str_replace('[account-hash]', '([0-9a-zA-Z]{8})', $str);
        $str = '/^'.str_replace('/', '\/', $str).'[\/]?$/';
        return $str;
    }

    private static function url()
    {
        $uri_sp =  explode("?",$_SERVER["REQUEST_URI"]);
        return strval($uri_sp[0]);
    }

    public static function run()
    {
        $match = false;
        if( isset(self::$routes[$_SERVER["REQUEST_METHOD"]]) )
        {
            foreach( self::$routes[$_SERVER["REQUEST_METHOD"]] as $page )
            {
                $a = @preg_match($page["regex"], self::url(), $matches);
                if ($a) {
                    $action = $page["function"];
                    $act = explode('@', $action);
                    if( count($act) == 2 ) {
                        $controllerName = $act[0];
                        $methodName = $act[1];
                        if( file_exists('../controllers/'.$controllerName.'.php')  ){
                            include_once('../controllers/'.$controllerName.'.php');
                            if (method_exists('Controller\\' . $controllerName, $methodName)) {
                                if (is_callable('Controller\\' . $controllerName, $methodName)) {
                                    call_user_func(array('Controller\\' . $controllerName, $methodName), $matches);
                                    $match = true;
                                }
                            }
                        }
                    }
                }
            }
        }
        if( !$match ){
            View::page(self::$page404);
        }
    }


    public static function load(){
        foreach (scandir('../routes') as $f) {
            if( $f != '.' && $f != '..' ) {
                if (is_dir('../routes/' . $f)) {
                    foreach (scandir('../routes/'.$f) as $f2) {
                        if (substr($f2, -3, 3) == 'php') {
                            include_once('../routes/' . $f.'/'.$f2);
                        }
                    }
                } else {
                    if (substr($f, -3, 3) == 'php') {
                        include_once('../routes/'. $f);
                    }
                }
            }
        }

    }


}



