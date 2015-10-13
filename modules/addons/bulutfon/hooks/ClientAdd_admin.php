<?php

if(!isset($ClientAdd_admin)) {
    $ClientAdd_admin= function($args) use($provider,$token,$repository){
       //TODO :Hook bulunamadi!
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('ClientAdd_admin');
            $sms($gsm,$message);
        }
    };
}


return $ClientAdd_admin;