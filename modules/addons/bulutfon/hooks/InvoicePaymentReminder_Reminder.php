<?php

if(!isset($InvoicePaymentReminder_Reminder)) {
    $InvoicePaymentReminder_Reminder= function($args) use($provider,$token,$repository){
        //TODO : invoiceid icin method gerekli
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('InvoicePaymentReminder_Reminder',[$user->firstname,$user->lastname]);
            $sms($gsm,$message);
        }
    };
}


return $InvoicePaymentReminder_Reminder;