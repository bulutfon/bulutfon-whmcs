<?php
$hook = array(
    'hook' => 'InvoiceCreated',
    'function' => 'InvoiceCreated',
    'description' => array(
        'turkish' => 'Yeni bir fatura oluşturulduğunda mesaj gönderir',
        'english' => 'After invoice created'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, {duedate} son odeme tarihli {total} TL tutarinda bir fatura olusturulmustur. Fatura Numarasi: {invoiceid}. Detayli bilgi icin sitemizi ziyaret edin.',
    'variables' => '{firstname}, {lastname}, {duedate}, {total}, {invoiceid}'
);
if(!function_exists('InvoiceCreated')){

    function InvoiceCreated($args){
        //file_put_contents(__DIR__.'/test.txt', 'Invoice created');
      
    }
}


return $hook;
