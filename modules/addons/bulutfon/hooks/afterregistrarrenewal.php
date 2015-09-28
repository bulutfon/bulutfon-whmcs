<?php
$hook = array(
    'hook' => 'AfterRegistrarRenewal',
    'function' => 'AfterRegistrarRenewal',
    'description' => array(
        'turkish' => 'Domain yenilendikten sonra mesaj gönderir',
        'english' => 'After domain renewal'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, alan adiniz basariyla yenilendi. ({domain})',
    'variables' => '{firstname},{lastname},{domain}'
);
if(!function_exists('AfterRegistrarRenewal')){

}

return $hook;