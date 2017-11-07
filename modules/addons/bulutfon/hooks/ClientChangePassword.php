 <?php
if (!isset($ClientChangePassword)) {
    $ClientChangePassword = function ($args) use ($hooks, $sender) {
        $sender->find($args, 'userid')->send('ClientChangePassword');
    };
}

return $ClientChangePassword;
