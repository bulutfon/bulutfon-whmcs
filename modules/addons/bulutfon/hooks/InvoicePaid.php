<?php

if(!isset($InvoicePaid)) {
    $InvoicePaid= function($args) use($provider,$token,$repository){
       //TODO :invoiceid icin method gerekli
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('InvoicePaid',[$user->firstname,$user->lastname]);

            $sms($gsm,$message);
        }

    };
}


return $InvoicePaid;