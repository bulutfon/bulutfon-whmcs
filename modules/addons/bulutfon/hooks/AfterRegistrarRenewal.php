<?php

if(!isset($AfterRegistrarRenewal)) {
    $AfterRegistrarRenewal= function($args) use($provider,$token,$repository){

    };
}


return $AfterRegistrarRenewal;