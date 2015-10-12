<?php

if(!isset($AfterRegistrarRegistrationFailed)) {
    $AfterRegistrarRegistrationFailed= function($args) use($provider,$token,$repository){

    };
}


return $AfterRegistrarRegistrationFailed;