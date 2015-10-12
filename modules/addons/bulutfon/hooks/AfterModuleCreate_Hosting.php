<?php

if(!isset($AfterModuleCreate_Hosting)) {
    $AfterModuleCreate_Hosting = function($args) use($provider,$token,$repository){

    };
}


return $AfterModuleCreate_Hosting;