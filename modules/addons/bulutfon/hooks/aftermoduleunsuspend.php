<?php
$hook = array(
    'hook' => 'AfterModuleUnsuspend',
    'function' => 'AfterModuleUnsuspend',
    'description' => array(
        'turkish' => 'Bir hizmet tekrar başlatıldığında mesaj gönderir',
        'english' => 'After module unsuspend'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, hizmetiniz tekrar aktiflestirildi. ({domain})',
    'variables' => '{firstname},{lastname},{domain}'
);
if(!function_exists('AfterModuleUnsuspend')){
    function AfterModuleUnsuspend($args){

    }
}
return $hook;