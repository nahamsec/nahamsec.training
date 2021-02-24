<?php


namespace Controller;


class SQLi
{

    private static $sql_username = 'nahamsec';
    private static $sql_password = 'GtWKcpX3MAmCviGC';
    private static $db = 'nahamsec';

    public static function articleCount(){
        if( !isset($_GET["date"]) ){
            die("date argument missing");
        }
        $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname='.self::$db,self::$sql_username,self::$sql_password);
        $d = $pdo->prepare("select * from article where created_at like '%".$_GET["date"]."'  ");
        $d->execute( array() );
        \Output::success(array(
            'count' =>  $d->rowCount()
        ));
    }

    public static function lesson2(){
        $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname='.self::$db,self::$sql_username,self::$sql_password);
        $d = $pdo->prepare('select * from article order by id DESC ');
        $d->execute( array() );
        $data = array();
        while( $a = $d->fetch() ){
            $data[] = $a;
        }
        \View::page('sqli/lesson2',$data);
    }

    public static function article2(){
        $id = ( isset($_GET["id"]) ) ? intval($_GET["id"]) : 0;
        $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname='.self::$db,self::$sql_username,self::$sql_password);
        $d = $pdo->prepare('select * from article where id = ? ');
        $d->execute( array($id) );
        if( $article = $d->fetch() ){
            \View::page('sqli/article',$article);
        }else{
            die("Sorry we could not locate that article");
        }
    }

    public static function article(){
        $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname='.self::$db,self::$sql_username,self::$sql_password);
        $d = $pdo->prepare('select * from article where id = '.$_GET["id"].' ');
        $d->execute( array() );
        $errors = $d->errorInfo();
        if( intval($errors[0]) > 0 ){
            print_r( $errors[2] );
            exit();
        }
        if( $article = $d->fetch() ){
            \View::page('sqli/article',$article);
        }else{
            die("Sorry we could not locate that article");
        }
    }


    public static function lesson1(){
        $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname='.self::$db,self::$sql_username,self::$sql_password);
        $d = $pdo->prepare('select * from article order by id DESC ');
        $d->execute( array() );
        $data = array();
        while( $a = $d->fetch() ){
            $data[] = $a;
        }
        \View::page('sqli/lesson1',$data);
    }

}
