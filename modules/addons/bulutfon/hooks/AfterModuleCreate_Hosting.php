<?php

if(!isset($AfterModuleCreate_Hosting)) {
    $AfterModuleCreate_Hosting = function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('AfterModuleCreate_Hosting',[$user->firstname,$user->lastname,$args['domainid']]);
            // TODO : domainid yi cekecek sorgu gerekli
            $sms($gsm,$message);
        }

    };
}


return $AfterModuleCreate_Hosting;