<?php

if(!isset($AfterRegistrarRegistration_admin)) {
    $AfterRegistrarRegistration_admin= function($args) use($provider,$token,$repository){
        //TODO : Hook bulunamadı
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('AfterRegistrarRegistration_admin',[$args['domainid']]);
            //TODO : domainid icin sorgu gerekli
            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRegistration_admin;