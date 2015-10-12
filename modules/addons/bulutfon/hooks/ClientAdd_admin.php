<?php

if(!isset($ClientAdd_admin)) {
    $ClientAdd_admin= function($args) use($provider,$token,$repository){
       //TODO :Hook bulunamadi!
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $ClientAdd_admin;