<?php
if (!isset($AcceptOrder)) {
    $AcceptOrder = function ($args) use ($hooks, $sender) {
        $sender->find($args, 'orderid')->send('AcceptOrder');
    };
}

return $AcceptOrder;
