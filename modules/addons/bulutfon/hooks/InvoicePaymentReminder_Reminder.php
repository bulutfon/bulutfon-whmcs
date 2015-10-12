<?php

if(!isset($InvoicePaymentReminder_Reminder)) {
    $InvoicePaymentReminder_Reminder= function($args) use($provider,$token,$repository){
        //TODO : invoiceid icin method gerekli
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $InvoicePaymentReminder_Reminder;