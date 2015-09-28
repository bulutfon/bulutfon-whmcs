<?php
$hook = array(
    'hook' => 'AfterModuleChangePassword',
    'function' => 'AfterModuleChangePassword',
    'description' => array(
        'turkish' => 'Hosting hesabı şifresi değiştiğinde gönderir',
        'english' => 'After module change password'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, {domain} hizmetinin hosting sifresi basariyla degisti. KullaniciAdi: {username} Sifre: {password}',
    'variables' => '{firstname}, {lastname}, {domain}, {username}, {password}'
);
if(!function_exists('AfterModuleChangePassword')){
    function AfterModuleChangePassword($args){

    }
}
return $hook;
