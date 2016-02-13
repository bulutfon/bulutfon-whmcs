<?php
if (!isset($InvoicePaid)) {
    $InvoicePaid = function ($args) use ($hooks,$sender) {
        $user = $args['invoiceid'];
        var_dump($sender);die();

    };
}

return $InvoicePaid;
