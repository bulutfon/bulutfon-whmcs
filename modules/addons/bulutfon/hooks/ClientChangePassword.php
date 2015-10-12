<?php

if(!isset($ClientChangePassword)) {
    $ClientChangePassword= function($args) use($provider,$token,$repository){

    };
}


return $ClientChangePassword;