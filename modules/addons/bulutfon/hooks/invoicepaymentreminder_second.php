<?php
$hook = array(
    'hook' => 'InvoicePaymentReminder',
    'function' => 'InvoicePaymentReminder_secondoverdue',
    'description' => array(
        'turkish' => 'Ödenmemiş faturanın ikinci zaman aşımında mesaj gönderir',
        'english' => 'Invoice payment second for first overdue'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, {duedate} son odeme tarihli gecikmis bir faturaniz bulunmaktadir. Detayli bilgi icin sitemizi ziyaret edin.',
    'variables' => '{firstname}, {lastname}, {duedate}'
);

if(!function_exists('InvoicePaymentReminder_secondoverdue')){
    function InvoicePaymentReminder_secondoverdue($args){

    }
}

return $hook;
