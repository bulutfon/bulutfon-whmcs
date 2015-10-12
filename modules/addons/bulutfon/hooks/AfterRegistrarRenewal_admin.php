<?php

if(!isset($AfterRegistrarRenewal_admin)) {
    $AfterRegistrarRenewal_admin= function($args) use($provider,$token,$repository){

    };
}


return $AfterRegistrarRenewal_admin;