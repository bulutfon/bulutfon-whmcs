<?php

if(!isset($InvoicePaymentReminder_thirdoverdue)) {
    $InvoicePaymentReminder_thirdoverdue= function($args) use($provider,$token,$repository){
      //TODO :Hook bulunamadi
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }

    };
}


return $InvoicePaymentReminder_thirdoverdue;