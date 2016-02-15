<?php
if (!isset($InvoicePaymentReminder)) {
    $InvoicePaymentReminder = function ($args) use ($hooks,$sender) {
        $sender->find($args, 'invoiceid')->send('InvoicePaymentReminder');
    };
}

return $InvoicePaymentReminder;
