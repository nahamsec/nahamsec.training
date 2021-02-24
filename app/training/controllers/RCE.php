<?php


namespace Controller;


class RCE
{

    public static function lesson3comment($arg){
        if( file_exists(getcwd().'/../data/blogcomments/'.$arg[1].'.txt') ){
            include_once(getcwd().'/../data/blogcomments/'.$arg[1].'.txt');
        }else{
            echo "Comment does not exist";
        }
    }

    public static function lesson3(){
        if( isset($_POST["comment"]) ){
            file_put_contents(getcwd().'/../data/blogcomments/'.date("U").'.txt',$_POST["comment"]);
            \View::redirect('/');
        }
        \View::page('rce/lesson3');
    }

    public static function lesson2(){
        \View::page('rce/lesson2');
    }

    public static function lesson1(){
        \View::page('rce/lesson1');
    }

    public static function lesson1StockCheck(){
        echo exec('curl http://rce.nahamsec.training/stock/?id='.$_GET["product_id"]);
    }

    public static function lesson1Stock(){
        if( $_GET["id"] == 1 ){
            \Output::success(array(
                'stock' =>  43
            ));
        }else{
            \Output::error(array(
                'Could not find product ID: '.$_GET["id"]
            ),404);
        }
    }


}


