<?php
$hook = array(
    'hook' => 'AdminAreaHeadOutput',
    'function' => 'header_output',
    'type' => 'admin',
    'extra' => '',
    'defaultmessage' => '{username}, Yonetici paneline giris yapti.',
    'variables' => '{username}'
);
if(!function_exists('header_output')){
    function header_output($args){
         $head_return = '
        <link href="../modules/addons/bulutfon/assets/css/bulutfon.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../modules/addons/bulutfon/assets/js/bulutfon.js"></script>';
        return $head_return;
    }
}

return $hook;
