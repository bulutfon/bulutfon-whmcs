<?php
$hook = array(
    'hook' => 'AfterModuleSuspend',
    'function' => 'AfterModuleSuspend',
    'description' => array(
        'turkish' => 'Bir hizmet duraklatıldığında mesaj gönderir',
        'english' => 'After module suspended'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, hizmetiniz duraklatildi. ({domain})',
    'variables' => '{firstname},{lastname},{domain}'
);
if(!function_exists('AfterModuleSuspend')){
    function AfterModuleSuspend($args){


    }
}

return $hook;