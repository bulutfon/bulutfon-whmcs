<?php

if(!isset($DomainRenewalNotice)) {
    $DomainRenewalNotice= function($args) use($provider,$token,$repository){
     //TODO :Hook bulunamadi
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('DomainRenewalNotice',[$user->lastname,$args['domainid']]);
            $sms($gsm,$message);
        }
    };
}


return $DomainRenewalNotice;