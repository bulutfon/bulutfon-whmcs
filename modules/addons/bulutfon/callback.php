<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
use Bulutfon\Libraries\Provider;
use Bulutfon\Libraries\Repository;

include __DIR__ . '/../../../init.php';

$provider = new Provider(
    new Repository(),
    array(
        'admin_folder' => $customadminpath,
        'system_url' => $CONFIG['SystemURL'],
        'admin_url' => rtrim($CONFIG['SystemURL'], '/') . '/' . rtrim($customadminpath, '/') . '/',
    )
);

$provider->init();
