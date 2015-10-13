<?php

if(!isset($AfterRegistrarRenewal_admin)) {
    $AfterRegistrarRenewal_admin= function($args) use($provider,$token,$repository){
        //TODO: Hook bulunamadi!
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('AfterRegistrarRenewal_admin',[$args['domainid']]);
            //TODO :domainid yi cekecek sorgu gerekli
            $sms($gsm,$message);
        }

    };
}


return $AfterRegistrarRenewal_admin;