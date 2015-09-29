<?php
$hook = array(
    'hook' => 'TicketClose',
    'function' => 'TicketClose',
    'description' => array(
        'turkish' => 'Ticket kapatıldığında mesaj gönderir.',
        'english' => 'When the ticket is closed it sends a message.'
    ),
    'type' => 'client',
    'extra' => '',
	'defaultmessage' => 'Sayin {firstname} {lastname}, ({ticketno}) numarali ticket kapatilmistir.',
    'variables' => '{firstname}, {lastname}, {ticketno}',
);

if(!function_exists('TicketClose')){
    function TicketClose($args){
        //sendPusherMessage(json_encode($args));
    }
}

return $hook;
