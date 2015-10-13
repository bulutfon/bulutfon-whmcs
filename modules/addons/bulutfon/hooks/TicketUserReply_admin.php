<?php

if(!isset($TicketUserReply_admin)) {
    $TicketUserReply_admin= function($args) use($provider,$token,$repository){
            $user = $repository->findUserByTicketId($args['ticketid']);
            $gsm = $repository->getFirstGsm($user);
            if($gsm) {
                $message = $repository->getSmsMessage('TicketUserReply_admin');
                $sms($gsm,$message);
            }



        };
}


return $TicketUserReply_admin;