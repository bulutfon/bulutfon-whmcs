<?php

if(!isset($InvoicePaymentReminder_secondoverdue)) {
    $InvoicePaymentReminder_secondoverdue= function($args) use($provider,$token,$repository){

    };
}


return $InvoicePaymentReminder_secondoverdue;