<?php

if(!isset($AfterModuleSuspend)) {
    $AfterModuleSuspend= function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('AfterModuleSuspend',[$user->lastname,$args['domainid']]);
            //TODO : domainid yi cekecek sorgu gerekli!
            $sms($gsm,$message);
        }
    };
}


return $AfterModuleSuspend;