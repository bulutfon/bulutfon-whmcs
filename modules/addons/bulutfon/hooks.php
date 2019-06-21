<?php



use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use WHMCS\Module\Addon\Bulutfon\Core\Sender;
use WHMCS\Module\Addon\Bulutfon\Core\Sms;

define('ENV', 'DEV');

$logger = new Logger('bulutfon');
$logger->pushHandler(new StreamHandler(__DIR__.'/logs/bulutfon.log', Logger::DEBUG));



add_hook("AdminAreaFooterOutput", 10, function($vars){

    return "<script src='{$vars['WEB_ROOT']}/modules/addons/bulutfon/assets/js/bulutfon.js'></script>\n";
});

$templates = new Sms;
$sender = new Sender($logger);
$hooks = $templates->activeHooks();
foreach ($hooks as $hook) {
    add_hook($hook->name, 1, require_once("hooks/{$hook->name}.php"));
}
