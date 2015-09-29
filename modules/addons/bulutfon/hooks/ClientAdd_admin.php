<?php
$hook = array(
    'hook' => 'ClientAdd',
    'function' => 'ClientAdd_admin',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => 'Sitenize yeni musteri kayit oldu.',
    'variables' => ''
);
if(!function_exists('ClientAdd_admin')){
    function ClientAdd_admin($args){

    }
}
return $hook;