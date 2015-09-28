<?php
$hook = array(
    'hook' => 'ClientChangePassword',
    'function' => 'ClientChangePassword',
    'description' => array(
        'turkish' => 'Müşteri şifresini değiştirdiğinde mesaj gönderir',
        'english' => 'After client change password'
    ),
    'type' => 'client',
    'extra' => '',
    'variables' => '{firstname},{lastname}',
    'defaultmessage' => 'Sayin {firstname} {lastname}, sifreniz degistirildi. Eger bu islemi siz yapmadiysaniz lutfen bizimle iletisime gecin.',
);

if(!function_exists('ClientChangePassword')){
    function ClientChangePassword($args){

    }
}

return $hook;