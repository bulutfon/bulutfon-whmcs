<?php
$hook = array(
    'hook' => 'AfterRegistrarRenewalFailed',
    'function' => 'AfterRegistrarRenewalFailed_admin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => 'Domain yenilenirken hata olustu. {domain}',
    'variables' => '{domain}'
);
if(!function_exists('AfterRegistrarRenewalFailed_admin')){
    function AfterRegistrarRenewalFailed_admin($args){

    }
}

return $hook;