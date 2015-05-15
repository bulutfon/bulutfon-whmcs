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
    echo "<pre>",var_dump($var),"</pre>";
    die();
}

$repository = new \Bulutfon\Libraries\Repository();

$numbers = $repository->checkNumber(905070420619,true);
foreach($numbers as $number){
    print_r($number->phonenumber);
}
