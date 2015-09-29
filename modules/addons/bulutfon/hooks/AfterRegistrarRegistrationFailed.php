<?php
$hook = array(
    'hook' => 'AfterRegistrarRegistrationFailed',
    'function' => 'AfterRegistrarRegistrationFailed',
    'description' => array(
        'turkish' => 'Domain kayıt edilirken hata oluşursa mesaj gönderilir',
        'english' => 'After domain registration failed'
    ),
    'type' => 'client',
    'extra' => '',
    'defaultmessage' => 'Sayin {firstname} {lastname}, alan adiniz kayit edilemedi. En kisa surede lutfen bizimle iletisime gecin ({domain})',
    'variables' => '{firstname},{lastname},{domain}'
);
if(!function_exists('AfterRegistrarRegistrationFailed')){


}

return $hook;
