<?php

if(!isset($InvoicePaymentReminder_Firstoverdue)) {
    $InvoicePaymentReminder_Firstoverdue= function($args) use($provider,$token,$repository){

    };
}


return $InvoicePaymentReminder_Firstoverdue;