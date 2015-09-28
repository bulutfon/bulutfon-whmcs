<?php
$hook = array(
    'hook' => 'TicketUserReply',
    'function' => 'TicketUserReply_admin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => 'Bir ticket musteri tarafindan guncellendi. ({subject})',
    'variables' => '{subject}'
);

if(!function_exists('TicketUserReply_admin')){
    function TicketUserReply_admin($args){

    }
}

return $hook;
