<?php
$hook = array(
    'hook' => 'AfterRegistrarRenewal',
    'function' => 'AfterRegistrarRenewal_admin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => 'Domain yenilendi. {domain}',
    'variables' => '{domain}'
);
if(!function_exists('AfterRegistrarRenewal_admin')){
    function AfterRegistrarRenewal_admin($args){

    }
}

return $hook;