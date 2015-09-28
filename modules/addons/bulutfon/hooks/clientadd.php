<?php
$hook = array(
    'hook' => 'ClientAdd',
    'function' => 'ClientAdd',
    'description' => array(
        'turkish' => 'Müşteri kayıt olduktan sonra mesaj gönderir',
        'english' => 'After client register'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, AktuelHost a kayit oldugunuz icin tesekkur ederiz. Email: {email} Sifre: {password}',
    'variables' => '{firstname},{lastname},{email},{password}'
);
if(!function_exists('ClientAdd')){
    function ClientAdd($args){

    }
}

return $hook;