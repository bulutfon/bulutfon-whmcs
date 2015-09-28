<?php
$hook = array(
    'hook' => 'InvoicePaymentReminder',
    'function' => 'InvoicePaymentReminder_thirdoverdue',
    'description' => array(
        'turkish' => 'Ödenmemiş faturanın üçüncü zaman aşımında mesaj gönderir',
        'english' => 'Invoice payment third for first overdue'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, {duedate} son odeme tarihli gecikmis bir faturaniz bulunmaktadir. Detayli bilgi icin sitemizi ziyaret edin.',
    'variables' => '{firstname}, {lastname}, {duedate}'
);

if(!function_exists('InvoicePaymentReminder_thirdoverdue')){
    function InvoicePaymentReminder_thirdoverdue($args){

    }
}

return $hook;
