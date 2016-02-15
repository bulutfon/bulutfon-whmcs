<?php
if (!isset($InvoiceCreated)) {
    $InvoiceCreated = function ($args) use ($hooks,$sender) {
        $sender->find($args, 'invoiceid')->send('InvoiceCreated');
    };
}
return $InvoiceCreated;
