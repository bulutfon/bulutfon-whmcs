<?php

if(!isset($TicketAdminReply)) {
    $TicketAdminReply = function($args) use($provider,$token,$repository){
        $user = $repository->findUserByTicketId($args['ticketid']);
        $gsm = $repository->getFirstGsm($user);
        if($gsm) {
            $message = $provider->sendMessage($token,[
                'title'=>'NETINTERNET',
                'content'=>$repository->getSmsMessage('TicketAdminReply',[$user->firstname,$user->lastname,$args['subject']]),
                'receivers' => $gsm
            ]);
        }
    };
}


return $TicketAdminReply;
