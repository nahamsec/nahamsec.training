<?php


namespace Controller;


class Upload
{

    public static function lesson1(){
        $error = false;
        if( isset($_GET["clear"] ) ){
            file_put_contents('uploads/filelist.json', '[]' );
            \View::redirect('/');
        }
        if( isset($_FILES["file"]) ){
            if( strstr(strtolower($_FILES["file"]["name"]),'.png') || strstr(strtolower($_FILES["file"]["name"]),'.jpeg') || strstr(strtolower($_FILES["file"]["name"]),'.jpg') || strstr(strtolower($_FILES["file"]["name"]),'.gif') ){
                $upload_file = json_decode(file_get_contents('uploads/filelist.json'),true);
                $upload_file[] = array(
                    'name'  =>  $_FILES["file"]["name"],
                );
                move_uploaded_file($_FILES["file"]["tmp_name"],getcwd().'/uploads/'.$_FILES["file"]["name"] );
                file_put_contents('uploads/filelist.json', json_encode($upload_file) );
            }else{
                $error = true;
            }
        }
        $data = array(
            'error' =>  $error,
            'files' =>  json_decode(file_get_contents('uploads/filelist.json'),true)
        );
        \View::page('upload/lesson1',$data);
    }

    public static function lesson2(){
        $error = false;
        if( isset($_GET["clear"] ) ){
            file_put_contents('uploads/filelist2.json', '[]' );
            \View::redirect('/');
        }
        if( isset($_FILES["file"]) ){
            if( strtolower($_FILES["file"]["type"]) === 'image/jpeg' || strtolower($_FILES["file"]["type"]) === 'image/jpg' ){
                $upload_file = json_decode(file_get_contents('uploads/filelist2.json'),true);
                $upload_file[] = array(
                    'name'  =>  $_FILES["file"]["name"],
                );
                move_uploaded_file($_FILES["file"]["tmp_name"],getcwd().'/uploads/'.$_FILES["file"]["name"] );
                file_put_contents('uploads/filelist2.json', json_encode($upload_file) );
            }else{
                $error = true;
            }
        }
        $data = array(
            'error' =>  $error,
            'files' =>  json_decode(file_get_contents('uploads/filelist2.json'),true)
        );
        \View::page('upload/lesson2',$data);
    }

}