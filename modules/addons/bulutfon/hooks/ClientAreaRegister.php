<?php
if (!isset($ClientAreaRegister)) {
    $ClientAreaRegister = function ($args) use ($hooks,$sender) {
        $sender->find($args, 'userid')->send('ClientAreaRegister');
    };
}

return $ClientAreaRegister;
