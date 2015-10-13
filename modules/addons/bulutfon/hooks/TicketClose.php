<?php

if(!isset($TicketClose)) {
    $TicketClose= function($args) use($provider,$token,$repository){
        $user = $repository->findUserByTicketId($args['ticketid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
           //TODO : TicketClose template i yazilmali
            $sms($gsm,$message);
        }

    };
}


return $TicketClose;