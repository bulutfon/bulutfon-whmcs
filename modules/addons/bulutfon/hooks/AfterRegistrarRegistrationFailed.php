<?php

if(!isset($AfterRegistrarRegistrationFailed)) {
    $AfterRegistrarRegistrationFailed= function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('AfterRegistrarRegistrationFailed',[$user->firstname,$user->lastname,$args['domainid']]);
            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRegistrationFailed;