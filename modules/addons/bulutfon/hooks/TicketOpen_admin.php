<?php

if(!isset($TicketOpen_admin)) {
    $TicketOpen_admin= function($args) use($provider,$token,$repository){


    };
}


return $TicketOpen_admin;