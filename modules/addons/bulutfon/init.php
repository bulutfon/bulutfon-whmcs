<?php
/*error_reporting(E_ALL);
ini_set("display_errors", 1);*/

include __DIR__.'/../../../configuration.php';
include __DIR__.'/vendor/autoload.php';

ORM::configure('mysql:host=localhost;dbname='.$db_name);
ORM::configure('username',$db_username);
ORM::configure('password',$db_password);

/**
 * Some helper functions to debugging.
 * @param $var
 */
function pp($var){
    echo "<pre>",print_r($var),"</pre>";
}
function dd($var){
    echo "<pre>",print_r($var),"</pre>";
    die();
}

