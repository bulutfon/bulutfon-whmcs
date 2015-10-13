<?php

if(!isset($InvoicePaymentReminder_thirdoverdue)) {
    $InvoicePaymentReminder_thirdoverdue= function($args) use($provider,$token,$repository){
      //TODO :Hook bulunamadi
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('InvoicePaymentReminder_thirdoverdue',[$user->firstname,$user->lastname]);
            $sms($gsm,$message);
        }

    };
}


return $InvoicePaymentReminder_thirdoverdue;