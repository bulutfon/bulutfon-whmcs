<?php

if(!isset($InvoicePaymentReminder)) {
    $InvoicePaymentReminder= function($args) use($provider,$token,$repository,$sms){
        $user = $repository->findUserByInvoiceId($args['invoiceid']);
        $gsm = $repository->getFirstGsm($user);
        $reminders = ['reminder', 'firstoverdue', 'secondoverdue','thirdoverdue'];
        if($gsm && in_array($args['type'], $reminders)) {
            $message = $repository->getSmsMessage('InvoicePaymentReminder',[$user->lastname,$user->lastname,$user->duedate]);
            $sms($gsm,$message);
        }

    };
}


return $InvoicePaymentReminder;