<?php
$hook = array(
    'hook' => 'DailyCronJob',
    'function' => 'DomainRenewalNotice',
    'description' => array(
        'turkish' => 'Domainin yenilenmesine {x} gün kala mesaj gönderir',
        'english' => 'Donmain renewal notice before {x} days ago'
    ),
    'type' => 'client',
    'extra' => '15',
    'defaultmessage' => 'Sayin {firstname} {lastname}, {domain} alanadiniz {expirydate}({x} gun sonra) tarihinde sona erecektir. Yenilemek icin sitemizi ziyaret edin. www.aktuelhost.com',
    'variables' => '{firstname}, {lastname}, {domain},{expirydate},{x}'
);
if(!function_exists('DomainRenewalNotice')){
    function DomainRenewalNotice($args){

    }
}
return $hook;