<?php
if (!isset($TicketUserReply)) {
    $TicketUserReply = function ($args) use ($hooks,$sender) {
        $sender->find($args, 'userid')->send('TicketUserReply');
    };
}

return $TicketUserReply;
