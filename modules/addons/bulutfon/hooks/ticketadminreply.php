<?php
$hook = array(
    'hook' => 'TicketAdminReply',
    'function' => 'TicketAdminReply',
    'description' => array(
        'turkish' => 'Bir ticket güncellendiğinde mesaj gönderir',
        'english' => 'After ticket replied by admin'
    ),
    'type' => 'client',
    'extra' => '',
    'variables' => '{firstname},{lastname},{ticketsubject}',
    'defaultmessage' => 'Sayin {firstname} {lastname}, ({ticketsubject}) konu baslikli destek talebiniz yanitlandi.',
);

if(!function_exists('TicketAdminReply')){
    function TicketAdminReply($args){

    }
}

return $hook;
