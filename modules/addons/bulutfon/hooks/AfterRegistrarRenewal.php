<?php

if(!isset($AfterRegistrarRenewal)) {
    $AfterRegistrarRenewal= function($args) use($provider,$token,$repository){
        $user = $repository->findUserByDomainId($args['domainid']); //TODO : Yazdıgım method gerekli!
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('AfterRegistrarRenewal',[$user->firstname,$user->lastname,$args['domainid']]);
            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRenewal;