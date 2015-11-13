<?php
if (!isset($InvoicePaid)) {
    $InvoicePaid = function ($args) use ($provider, $token, $repository, $sms) {
        $user = $repository->findUserByInvoiceId($args['invoiceid']);
        $gsm = $repository->getFirstGsm($user);
        if ($gsm) {
            $message = $repository->getSmsMessage('InvoicePaid', [$user->firstname, $user->lastname, $user->duedate,$user->total]);
            $sms($gsm, $message);
        }
    };
}

return $InvoicePaid;
