<?php
$hook = array(
    'hook' => 'InvoicePaid',
    'function' => 'InvoicePaid',
    'description' => array(
        'turkish' => 'Faturanız ödendiğinde mesaj gönderir',
        'english' => 'Whenyou have paidthe billsends a message.'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, {duedate} son odeme tarihli faturaniz odenmistir. Odeme icin tesekkur ederiz.',
    'variables' => '{firstname}, {lastname}, {duedate}'
);
if(!function_exists('InvoicePaid')){
    function InvoicePaid($args){

    }
}

return $hook;
