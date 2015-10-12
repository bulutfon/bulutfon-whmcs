<?php

if(!isset($InvoicePaymentReminder_secondoverdue)) {
    $InvoicePaymentReminder_secondoverdue= function($args) use($provider,$token,$repository){
        //TODO :Hook bulunamadi
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }
    };
}


return $InvoicePaymentReminder_secondoverdue;