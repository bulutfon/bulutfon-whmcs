<?php

if(!isset($ClientAdd)) {
    $ClientAdd= function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('ClientAdd',[$user->lastname, $user->email, $user->password]);
            $sms($gsm,$message);
        }
    };
}


return $ClientAdd;