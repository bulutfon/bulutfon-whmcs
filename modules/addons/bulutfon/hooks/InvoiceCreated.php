<?php
if (!isset($InvoiceCreated)) {
    $InvoiceCreated = function ($args) use ($hooks,$sender) {
        $invoiceid = $args['invoiceid'];
        $user = $args['user'];
        die($user);
    };
}
return $InvoiceCreated;
