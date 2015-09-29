<?php
$hook = array(
    'hook' => 'AdminLogin',
    'function' => 'AdminLogin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => '{username}, Yonetici paneline giris yapti.',
    'variables' => '{username}'
);
if(!function_exists('AdminLogin')){
    function AdminLogin($args){
        //sendPusherMessage("{$args['username']} giris yapti.");
    }
}

return $hook;
