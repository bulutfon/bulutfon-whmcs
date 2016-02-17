<?php
if (!isset($TicketAdminReply)) {
    $TicketAdminReply = function ($args) use ($hooks,$sender) {
        $sender->find($args, 'ticketid')->send('TicketAdminReply');
    };
}

return $TicketAdminReply;
