<?php
if (!isset($AcceptOrder)) {
    $AcceptOrder = function ($args) use ($hooks,$sender,$log) {
        //$result = $sender->find($args['orderid'], 'order')->send();
        $log->addError(' ----> Accept order worked.');
    };
}

return $AcceptOrder;
