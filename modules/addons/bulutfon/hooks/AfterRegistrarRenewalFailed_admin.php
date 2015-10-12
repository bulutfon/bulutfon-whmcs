<?php

if(!isset($AfterRegistrarRenewalFailed_admin)) {
    $AfterRegistrarRenewalFailed_admin= function($args) use($provider,$token,$repository){
     //TODO: Hook bulunamadi
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRenewalFailed_admin;