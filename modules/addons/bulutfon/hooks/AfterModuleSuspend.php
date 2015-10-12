<?php

if(!isset($AfterModuleSuspend)) {
    $AfterModuleSuspend= function($args) use($provider,$token,$repository){

    };
}


return $AfterModuleSuspend;