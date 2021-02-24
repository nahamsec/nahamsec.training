<?php


namespace Controller;


trait XSS
{


    public static function lesson1(){
        $data = array(
            'name'  =>  ( ( isset($_POST["name"]) ) ? $_POST["name"] : false )
        );
        \View::page('xss/lesson1',$data);
    }

    public static function lesson2(){
        $data = array(
            'name'  =>  ( ( isset($_POST["name"]) ) ? $_POST["name"] : false )
        );
        \View::page('xss/lesson2',$data);
    }

    public static function lesson3(){
        $data = array(
            'name'  =>  ( ( isset($_POST["name"]) ) ? $_POST["name"] : false )
        );
        \View::page('xss/lesson3',$data);
    }

    public static function lesson4(){
	if( isset($_GET["name"]) ){
	    $_GET["name"] = str_replace("<","&lt;",$_GET["name"]);
            $_GET["name"] = str_replace(">","&gt;",$_GET["name"]);
	}
        $data = array(
            'name'  =>  ( ( isset($_GET["name"]) ) ? $_GET["name"] : false )
        );
        \View::page('xss/lesson4',$data);
    }


}
