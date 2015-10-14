<?php

if(!isset($TicketOpen_admin)) {
    $TicketOpen_admin= function($args) use($provider,$token,$repository){
        $user = $repository->findUserByTicketId($args['ticketid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $repository->getSmsMessage('TicketOpen_admin');//TODO : subject eklenecek!
            $sms($gsm,$message);
        }

    };
}


return $TicketOpen_admin;