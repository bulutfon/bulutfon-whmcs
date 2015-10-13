<?php

if(!isset($ClientChangePassword)) {
    $ClientChangePassword= function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('ClientChangePassword',[$user->lastname]);
            $sms($gsm,$message);
        }
    };
}


return $ClientChangePassword;