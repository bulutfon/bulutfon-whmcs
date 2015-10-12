<?php

if(!isset($AfterModuleUnsuspend)) {
    $AfterModuleUnsuspend= function($args) use($provider,$token,$repository){

    };
}


return $AfterModuleUnsuspend;