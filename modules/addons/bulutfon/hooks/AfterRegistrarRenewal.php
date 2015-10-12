<?php

if(!isset($AfterRegistrarRenewal)) {
    $AfterRegistrarRenewal= function($args) use($provider,$token,$repository){
        //TODO :User id icin Domain Metodu gerekli!
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRenewal;