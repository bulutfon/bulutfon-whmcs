<?php

if(!isset($AfterRegistrarRegistrationFailed_admin)) {
    $AfterRegistrarRegistrationFailed_admin= function($args) use($provider,$token,$repository){

    };
}


return $AfterRegistrarRegistrationFailed_admin;