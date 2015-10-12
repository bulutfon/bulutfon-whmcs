<?php

if(!isset($AfterRegistrarRegistrationFailed)) {
    $AfterRegistrarRegistrationFailed= function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRegistrationFailed;