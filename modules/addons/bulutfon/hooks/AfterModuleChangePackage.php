<?php

if(!isset($AfterModuleChangePackage)) {
    $AfterModuleChangePackage = function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO : AfterModuleChangePackage Template'i Yazilmali!
            $sms($gsm,$message);
        }
    };
}


return $AfterModuleChangePackage;