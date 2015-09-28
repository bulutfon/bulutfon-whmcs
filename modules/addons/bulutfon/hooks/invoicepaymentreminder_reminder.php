<?php
$hook = array(
    'hook' => 'InvoicePaymentReminder',
    'function' => 'InvoicePaymentReminder_Reminder',
    'description' => array(
        'turkish' => 'Ödenmemiş fatura için bilgi mesajı gönderir',
        'english' => 'Invoice payment reminder'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, {duedate} son odeme tarihli bir faturaniz bulunmaktadir. Detayli bilgi icin sitemizi ziyaret edin. www.aktuelhost.com',
    'variables' => '{firstname}, {lastname}, {duedate}'
);

if(!function_exists('InvoicePaymentReminder_Reminder')){
    function InvoicePaymentReminder_Reminder($args){

    }
}

return $hook;