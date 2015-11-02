<?php

if(!isset($InvoicePaymentReminder_Firstoverdue)) {
    $InvoicePaymentReminder_Firstoverdue= function($args) use($provider,$token,$repository){
        //TODO : Hook bulunamadi
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('InvoicePaymentReminder_Firstoverdue',[$user->lastname]);

            $sms($gsm,$message);
        }

    };
}


return $InvoicePaymentReminder_Firstoverdue;