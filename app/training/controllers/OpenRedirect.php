<?php


namespace Controller;


class OpenRedirect
{

    public static function lesson1(){
        if( isset($_GET["redirect"]) ){
            \View::redirect($_GET["redirect"]);
        }
        \View::page('or/lesson1-2');
    }

    public static function lesson2(){
        if( isset($_GET["redirect"]) ){
            if( substr($_GET["redirect"],0,21) == 'http://www.google.com' ){
                \View::redirect($_GET["redirect"]);
            }else{
                die("Redirect not allowed to this host");
            }
        }
        \View::page('or/lesson1-2');
    }

}