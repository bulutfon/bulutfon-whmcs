<?php

if(!isset($AfterRegistrarRegistrationFailed_admin)) {
    $AfterRegistrarRegistrationFailed_admin= function($args) use($provider,$token,$repository){
      // TODO: Hook bulunamadı
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('AfterRegistrarRegistrationFailed_admin',[$args['domainid']]);
            // TODO : domainid cekecek sorgu gerekli!

            $sms($gsm,$message);
        }
    };
}


return $AfterRegistrarRegistrationFailed_admin;