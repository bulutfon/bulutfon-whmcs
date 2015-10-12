<?php

if(!isset($AfterRegistrarRegistration_admin)) {
    $AfterRegistrarRegistration_admin= function($args) use($provider,$token,$repository){
        //TODO : Hook bulunamadı
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRegistration_admin;