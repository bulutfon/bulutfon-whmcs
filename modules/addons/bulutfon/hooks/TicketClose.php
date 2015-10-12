<?php

if(!isset($TicketClose)) {
    $TicketClose= function($args) use($provider,$token,$repository){

    };
}


return $TicketClose;