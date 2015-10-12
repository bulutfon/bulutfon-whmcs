<?php

if(!isset($AfterModuleChangePassword)) {
    $AfterModuleChangePassword = function($args) use($provider,$token,$repository){

    };
}


return $AfterModuleChangePassword;