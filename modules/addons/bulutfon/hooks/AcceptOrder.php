<?php

if(!isset($AcceptOrder)) {
    $AcceptOrder = function($args) use($provider,$token,$repository){
       $user = $repository->findUserByOrderId($args['orderid']);
       $gsm = $repository->getFirstGsm($user);
       if($gsm) {
        
       }
    };
}


return $AcceptOrder;
