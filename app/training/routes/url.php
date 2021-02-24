<?php
//$_SERVER["HTTP_HOST"] = 'csrf.nahamsec.test';

$split_url = explode(".",$_SERVER["HTTP_HOST"]);

$module = $split_url[0];
$valid_modules = array(
    'www'                  =>  1,
    'xss'                  =>  1,
    'xss2'                 =>  1,
    'xss3'                 =>  1,
    'xss4'                 =>  1,
    'or1'                  =>  1,
    'or2'                  =>  1,
    'csrf'                 =>  1,
    'idor'                 =>  1,
    'lfi'                  =>  1,
    'sqli'                 =>  1,
    'sqli2'                =>  1,
    'ssrf'                 =>  1,
    'ssrf2'                =>  1,
    'ssrf3'                =>  1,
    'ssrf4'                =>  1,
    'ssrf5'                =>  1,
    'ssrf6'                =>  1,
    'ssrf7'                =>  1,
    'xxe'                  =>  1,
    'xxe2'                  =>  1,
    'upload'               =>  1,
    'upload2'               =>  1,
    'rce'                  =>  1,
    'rce2'                  =>  1,
    'rce3'                  =>  1,
);
\Controller\Home::$modules = $valid_modules;


if( isset($valid_modules[$module]) ) {


    if( $module == 'rce' ){
        Route::add(array('GET', 'POST'), '/', 'RCE@lesson1');
        Route::add(array('GET', 'POST'), '/stock-check', 'RCE@lesson1StockCheck');
        Route::add(array('GET', 'POST'), '/stock', 'RCE@lesson1Stock');
    }

    if( $module == 'rce2' ){
        Route::add(array('GET', 'POST'), '/', 'RCE@lesson2');
    }

    if( $module == 'rce3' ){
        Route::add(array('GET', 'POST'), '/', 'RCE@lesson3');
        Route::add(array('GET', 'POST'), '/comment/[int]', 'RCE@lesson3comment');
    }

    if( $module == 'xss' ){
        Route::add(array('GET', 'POST'), '/', 'XSS@lesson1');
    }

    if( $module == 'xss2' ){
        Route::add(array('GET', 'POST'), '/', 'XSS@lesson2');
    }

    if( $module == 'xss3' ){
        Route::add(array('GET', 'POST'), '/', 'XSS@lesson3');
    }

    if( $module == 'xss4' ){
        Route::add(array('GET', 'POST'), '/', 'XSS@lesson4');
    }


    if( $module == 'or1' ){
        Route::add(array('GET', 'POST'), '/', 'OpenRedirect@lesson1');
    }

    if( $module == 'or2' ){
        Route::add(array('GET', 'POST'), '/', 'OpenRedirect@lesson2');
    }

    if( $module == 'ssrf' ){
        Route::add(array('GET', 'POST'), '/', 'SSRF@lesson1');
    }

    if( $module == 'ssrf2' ){
        Route::add(array('GET', 'POST'), '/', 'SSRF@lesson2');
    }

    if( $module == 'ssrf3' ){
        Route::add(array('GET', 'POST'), '/', 'SSRF@lesson3');
    }

    if( $module == 'ssrf4' ){
        Route::add(array('GET', 'POST'), '/', 'SSRF@lesson4');
    }

    if( $module == 'ssrf5' ){
        Route::add(array('GET', 'POST'), '/', 'SSRF@lesson5');
    }

    if( $module == 'ssrf6' ){
        Route::add(array('GET', 'POST'), '/', 'SSRF@lesson6');
    }

    if( $module == 'ssrf7' ){
        Route::add(array('GET', 'POST'), '/', 'SSRF@lesson7');
    }

    if( $module == 'lfi' ){
        Route::add(array('GET', 'POST'), '/', 'LFI@lesson1');
        Route::add(array('GET', 'POST'), '/image', 'LFI@image');
    }

    if( $module == 'csrf' ){
        Route::add(array('GET', 'POST'), '/', 'CSRF@home');
        Route::add(array('GET', 'POST'), '/logout', 'CSRF@logout');
        Route::add(array('GET', 'POST'), '/login', 'CSRF@login');
        Route::add(array('GET', 'POST'), '/email', 'CSRF@email');
        Route::add(array('GET', 'POST'), '/reset-password', 'CSRF@resetPassword');
        Route::add(array('GET', 'POST'), '/password', 'CSRF@password');
        Route::add(array('GET', 'POST'), '/notifications', 'CSRF@notifications');
        Route::add(array('GET', 'POST'), '/reset', 'CSRF@reset');
    }

    if( $module == 'idor' ){
        Route::add(array('GET', 'POST'), '/', 'IDOR@lesson1');
        Route::add(array('GET', 'POST'), '/settings/[int]', 'IDOR@account');
    }

    if( $module == 'sqli' ) {
        Route::add(array('GET', 'POST'), '/', 'SQLi@lesson1');
        Route::add(array('GET', 'POST'), '/article', 'SQLi@article');
    }

    if( $module == 'sqli2' ) {
        Route::add(array('GET', 'POST'), '/', 'SQLi@lesson2');
        Route::add(array('GET', 'POST'), '/article', 'SQLi@article2');
        Route::add(array('GET', 'POST'), '/article-count', 'SQLi@articleCount');
    }

    if( $module == 'xxe' ) {
        Route::add(array('GET', 'POST'), '/', 'XXE@lesson1');
    }

    if( $module == 'xxe2' ) {
        Route::add(array('GET', 'POST'), '/', 'XXE@lesson2');
    }

    if( $module == 'upload' ) {
        Route::add(array('GET', 'POST'), '/', 'Upload@lesson1');
    }

    if( $module == 'upload2' ) {
        Route::add(array('GET', 'POST'), '/', 'Upload@lesson2');
    }

    if( $module == 'www' ) {
        Route::add(array('GET', 'POST'), '/', 'Home@listAll');
    }


}else{
    View::page('invalid');
}
