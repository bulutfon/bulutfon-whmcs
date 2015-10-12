<?php

if(!isset($InvoicePaymentReminder_thirdoverdue)) {
    $InvoicePaymentReminder_thirdoverdue= function($args) use($provider,$token,$repository){

    };
}


return $InvoicePaymentReminder_thirdoverdue;