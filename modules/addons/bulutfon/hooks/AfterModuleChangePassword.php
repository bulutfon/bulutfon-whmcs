<?php

if(!isset($AfterModuleChangePassword)) {
    $AfterModuleChangePassword = function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('AfterModuleChangePassword',[$user->firstname,$user->lastname,$args['domainid']]);
            //TODO : domainid yi cekecek sorgu gerekli!
            $sms($gsm,$message);
        }

    };
}


return $AfterModuleChangePassword;