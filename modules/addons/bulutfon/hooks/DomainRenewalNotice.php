<?php

if(!isset($DomainRenewalNotice)) {
    $DomainRenewalNotice= function($args) use($provider,$token,$repository){
     //TODO :Hook bulunamadi
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $DomainRenewalNotice;