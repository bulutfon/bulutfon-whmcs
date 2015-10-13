<?php

if(!isset($AfterModuleUnsuspend)) {
    $AfterModuleUnsuspend= function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
           // $message = $repository->getSmsMessage('AfterModuleUnsuspend',[$user->firstname,$user->lastname,$args['domainid']]);
            // TODO : domainid yi cekecek sorgu gerekli!
            $sms($gsm,$message);
        }

    };
}


return $AfterModuleUnsuspend;