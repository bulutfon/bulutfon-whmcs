<?php
$hook = array(
    'hook' => 'TicketOpen',
    'function' => 'TicketOpen_admin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => 'Yeni bir ticket acildi. ({subject})',
    'variables' => '{subject}'
);

if(!function_exists('TicketOpen_admin')){
    function TicketOpen_admin($args){

    }
}

return $hook;
