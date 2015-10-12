<?php

if(!isset($AfterRegistrarRegistrationFailed_admin)) {
    $AfterRegistrarRegistrationFailed_admin= function($args) use($provider,$token,$repository){
      // TODO: Hook bulunamadı
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRegistrationFailed_admin;