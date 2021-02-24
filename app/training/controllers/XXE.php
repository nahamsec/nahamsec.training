<?php


namespace Controller;


class XXE
{
    public static function lesson1(){
        $data = array();
        if( isset($_FILES["file"]) ){
            $data["urls"] = array();
            libxml_disable_entity_loader (false);
            $xmlfile = file_get_contents($_FILES["file"]["tmp_name"]);
            $dom = new \DOMDocument();
            $dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
            $creds = simplexml_import_dom($dom);
            foreach( $creds->url as $url ){
                $data["urls"][] = $url->loc;
            }
        }
        \View::page('xxe/lesson1',$data);
    }

    public static function lesson2(){
        $data = array(
            'done'  =>  false
        );
        if( isset($_FILES["file"]) ){
            $data["urls"] = array();
            libxml_disable_entity_loader (false);
            $xmlfile = file_get_contents($_FILES["file"]["tmp_name"]);
            $dom = new \DOMDocument();
            $dom->loadXML($xmlfile,  LIBXML_NOENT | LIBXML_DTDLOAD);
            simplexml_import_dom($dom);
            $data["done"] = true;
        }
        \View::page('xxe/lesson2',$data);
    }

}