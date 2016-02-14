<?php
if (!isset($TicketUserReply)) {
    $TicketUserReply = function ($args) use ($hooks,$sender,$log) {
        $result = $sender->find($args['userid'], 'userid')->send();


        $arr = array(
            'title' => 'TEST',
            'content' => 'Test Message',
            'receivers' => $result->phonenumber
        );

        $log->addError(json_encode($arr));
    };
}

return $TicketUserReply;
