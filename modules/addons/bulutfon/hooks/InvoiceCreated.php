<?php
if (!isset($InvoiceCreated)) {
    $InvoiceCreated = function ($args) use ($provider, $token, $repository, $sms) {
        $user = $repository->findUserByInvoiceId($args['invoiceid']);
        $gsm = $repository->getFirstGsm($user);
        if ($gsm) {
            $message = $repository->getSmsMessage('InvoiceCreated', [$user->lastname, $user->duedate, $user->total]);
            $sms($gsm, $message,$args['invoiceid'],$user->id);
        }
    };
}
return $InvoiceCreated;
