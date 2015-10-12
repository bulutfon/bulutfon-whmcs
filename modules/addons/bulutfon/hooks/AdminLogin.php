<?php

if(!isset($AdminLogin)) {
    $AdminLogin = function($args) use($provider,$token,$repository){

    };
}


return $AdminLogin;