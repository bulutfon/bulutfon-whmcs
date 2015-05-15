<?php
include __DIR__.'/../../../configuration.php';
include __DIR__."/vendor/autoload.php";
ORM::configure('mysql:host=localhost;dbname='.$db_name);
ORM::configure('username',$db_username);
ORM::configure('password',$db_password);

$customadminpath = isset($customadminpath) ? $customadminpath : false;

function pp($var){
    echo "<pre>",print_r($var),"</pre>";
}
function dd($var){
    echo "<pre>",print_r($var),"</pre>";
    die();
}

