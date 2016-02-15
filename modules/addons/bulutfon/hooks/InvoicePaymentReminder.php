<?php
if (!isset($InvoicePaymentReminder)) {
    $InvoicePaymentReminder = function ($args) use ($hooks,$sender) {
        $type = $args['type'];
        if($type == 'reminder') $args['type'] = "";
        if($type == 'firstoverdue') $args['type'] = "birinci";
        if($type == 'secondoverdue') $args['type'] = "ikinci";
        if($type == 'thirdoverdue') $args['type'] = "ucuncu";
        $sender->find($args, 'invoiceid')->send('InvoicePaymentReminder');
    };
}

return $InvoicePaymentReminder;
