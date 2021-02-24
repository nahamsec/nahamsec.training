<?php

if(!function_exists('classAutoLoader')){
    function classAutoLoader($class){
        $parts = explode('\\', $class);
        if( count($parts) == 2 ){
            if( $parts[0] == 'Model' || $parts[0] == 'Controller' ){
                $dir = ( $parts[0] == 'Model' ) ? 'models' : 'controllers';
                if( is_file('../'.$dir.'/'.$parts[1].'.php') ){
                    if( !class_exists($class) ) {
                        include_once('../'.$dir.'/'.$parts[1].'.php');
                    }
                }
            }
        }
    }
}

spl_autoload_register('classAutoLoader');