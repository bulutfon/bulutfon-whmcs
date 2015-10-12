<?php

if(!isset($AfterRegistrarRegistration_admin)) {
    $AfterRegistrarRegistration_admin= function($args) use($provider,$token,$repository){

    };
}


return $AfterRegistrarRegistration_admin;