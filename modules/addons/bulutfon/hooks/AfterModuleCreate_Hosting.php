<?php

if(!isset($AfterModuleCreate_Hosting)) {
    $AfterModuleCreate_Hosting = function($args) use($provider,$token,$repository){
        $user = $repository->findUserById($args['userid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }

    };
}


return $AfterModuleCreate_Hosting;