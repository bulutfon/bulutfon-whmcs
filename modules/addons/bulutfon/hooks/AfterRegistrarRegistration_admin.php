<?php
$hook = array(
    'hook' => 'AfterRegistrarRegistration',
    'function' => 'AfterRegistrarRegistration_admin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => 'Yeni domain kayit edildi. {domain}',
    'variables' => '{domain}'
);
if(!function_exists('AfterRegistrarRegistration_admin')){
    function AfterRegistrarRegistration_admin($args){

    }
}

return $hook;