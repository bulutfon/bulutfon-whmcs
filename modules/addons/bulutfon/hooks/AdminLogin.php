<?php
$hook = array(
    'hook' => 'AdminLogin',
    'function' => 'AdminLogin_admin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => '{username}, Yonetici paneline giris yapti.',
    'variables' => '{username}'
);
if(!function_exists('AdminLogin_admin')){
    function AdminLogin_admin($args){
     
    }
}

return $hook;
