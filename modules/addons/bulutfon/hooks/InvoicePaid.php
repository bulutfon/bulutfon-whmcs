<?php
if (!isset($InvoicePaid)) {
    $InvoicePaid = function ($args) use ($hooks, $sender) {
        $sender->find($args, 'invoiceid')->send('InvoicePaid');
    };
}

return $InvoicePaid;
