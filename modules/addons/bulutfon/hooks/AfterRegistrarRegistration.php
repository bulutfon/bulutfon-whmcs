<?php

if(!isset($AfterRegistrarRegistration)) {
    $AfterRegistrarRegistration= function($args) use($provider,$token,$repository){


    };
}


return $AfterRegistrarRegistration;