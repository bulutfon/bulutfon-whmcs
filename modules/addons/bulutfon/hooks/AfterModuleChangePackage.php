<?php
$hook = array(
    'hook' => 'AfterModuleChangePackage',
    'function' => 'AfterModuleChangePackage',
    'description' => array(
        'turkish' => 'Paket değişikliğinde mesaj gönderir',
        'english' => 'After module Change Package'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, ürün/hizmet paketiniz degistirildi. ({domain})',
    'variables' => '{firstname},{lastname},{domain}'
);
if(!function_exists('AfterModuleChangePackage')){
    function AfterModuleChangePackage($args){
  
    }
}
return $hook;
