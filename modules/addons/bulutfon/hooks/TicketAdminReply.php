<?php

if(!isset($TicketAdminReply)) {
    $TicketAdminReply = function($args) use($provider,$token,$repository,$sms){
        $user = $repository->findUserByTicketId($args['ticketid']);
        $gsm = $repository->getFirstGsm($user);
        
        if($gsm) {
            $message = $repository->getSmsMessage('TicketAdminReply',[$user->firstname,$user->lastname,$args['subject']]);
            $sms($gsm,$message);
        }
    };
}


return $TicketAdminReply;
