<?php
include __DIR__ . '/vendor/autoload.php';

use Xuma\Libraries\Sms;
use Xuma\Libraries\Sender;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

define('ENV','DEV');

$logger = new Logger('bulutfon');
$logger->pushHandler(new StreamHandler(__DIR__.'/logs/bulutfon.log', Logger::DEBUG));

$templates = new Sms;
$sender = new Sender($logger);
$hooks = $templates->activeHooks();
foreach ($hooks as $hook) add_hook($hook->name, 1, require_once ("hooks/{$hook->name}.php"));

