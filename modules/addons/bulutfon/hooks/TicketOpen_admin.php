<?php

if(!isset($TicketOpen_admin)) {
    $TicketOpen_admin= function($args) use($provider,$token,$repository){
        $user = $repository->findUserByTicketId($args['ticketid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            //TODO
            $sms($gsm,$message);
        }

    };
}


return $TicketOpen_admin;