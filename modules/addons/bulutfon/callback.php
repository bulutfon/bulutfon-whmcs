<?php
use Bulutfon\Libraries\Provider;
use Bulutfon\Libraries\Repository;

require "init.php";
include __DIR__.'/../../../init.php';

$provider = new Provider(
    new Repository(),
    array(
        'admin_folder'=>$customadminpath,
        'system_url'=>$CONFIG['SystemURL'],
        'admin_url'=>rtrim($CONFIG['SystemURL'],'/').'/'.rtrim($customadminpath,'/').'/'
    )
);

$provider->init();