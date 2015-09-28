<?php
$hook = array(
    'hook' => 'ClientLogin',
    'function' => 'ClientLogin_admin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => '({firstname} {lastname}), Siteye giris yapti',
    'variables' => '{firstname},{lastname}'
);

if(!function_exists('ClientLogin_admin')){
    function ClientLogin_admin($args){

    }
}

return $hook;
