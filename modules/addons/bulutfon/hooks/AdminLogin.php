<?php

if(!isset($AdminLogin)) {
    $AdminLogin = function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO Admin Login Template'i Yazılmalı!
            $sms($gsm,$message);
        }
    };
}


return $AdminLogin;