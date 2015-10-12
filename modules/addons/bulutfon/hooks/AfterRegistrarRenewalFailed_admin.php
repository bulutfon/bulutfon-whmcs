<?php

if(!isset($AfterRegistrarRenewalFailed_admin)) {
    $AfterRegistrarRenewalFailed_admin= function($args) use($provider,$token,$repository){

    };
}


return $AfterRegistrarRenewalFailed_admin;