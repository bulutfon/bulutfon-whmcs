<?php

if(!isset($InvoiceCreated)) {
    $InvoiceCreated= function($args) use($provider,$token,$repository){
        //TODO :invoiceid icin method gerekli
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('InvoiceCreated',[$user->lastname]);

            $sms($gsm,$message);
        }
    };
}


return $InvoiceCreated;