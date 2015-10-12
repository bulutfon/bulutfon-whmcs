<?php

if(!isset($AfterModuleChangePackage)) {
    $AfterModuleChangePackage = function($args) use($provider,$token,$repository){

    };
}


return $AfterModuleChangePackage;