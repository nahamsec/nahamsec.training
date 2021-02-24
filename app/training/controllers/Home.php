<?php


namespace Controller;


class Home
{

    public static $modules;

    public static function listAll(){
        \View::page('list', self::$modules );
    }

}