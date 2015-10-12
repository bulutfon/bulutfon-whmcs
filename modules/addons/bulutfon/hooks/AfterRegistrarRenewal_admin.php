<?php

if(!isset($AfterRegistrarRenewal_admin)) {
    $AfterRegistrarRenewal_admin= function($args) use($provider,$token,$repository){
        //TODO: Hook bulunamadi!
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }

    };
}


return $AfterRegistrarRenewal_admin;