<?php

if(!isset($ClientLogin)) {
    $ClientLogin= function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO ClientLogin_admin template i yazilmali!
            $sms($gsm,$message);
        }
    };
}


return $ClientLogin;