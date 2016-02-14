<?php
include 'libraries/Sms.php';
include 'libraries/User.php';
include 'libraries/Sender.php';


use Xuma\Libraries\Sms;
use Xuma\Libraries\Sender;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$log = new Logger('bulutfon');
$log->pushHandler(new StreamHandler(__DIR__.'/logs/bulutfon.log', Logger::WARNING));

$templates = new Sms;
$sender = new Sender;
$hooks = $templates->activeHooks();
foreach ($hooks as $hook) add_hook($hook->name, 1, require_once ("hooks/{$hook->name}.php"));

