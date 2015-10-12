<?php

if(!isset($ClientAdd_admin)) {
    $ClientAdd_admin= function($args) use($provider,$token,$repository){

    };
}


return $ClientAdd_admin;