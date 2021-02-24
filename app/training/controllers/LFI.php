<?php


namespace Controller;


class LFI
{

    public static function image(){
        if( isset($_GET["file"])){
            if( file_exists( getcwd().'/../data/images/'.$_GET["file"]) ){
                header('Content-Type: '.mime_content_type(getcwd().'/../data/images/'.$_GET["file"]));
                echo file_get_contents(getcwd().'/../data/images/'.$_GET["file"] );
            }else{
                die("File not found");
            }
        }else{
            die("File not found");
        }
    }

    public static function lesson1(){
        \View::page('lfi/lesson1');
    }

}