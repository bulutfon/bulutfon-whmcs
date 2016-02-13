<?php
include 'libraries/Sms.php';
include 'libraries/Sender.php';
use Xuma\Libraries\Sms;
use Xuma\Libraries\Sender;

$templates = new Sms;
$sender = new Sender;

$hooks = $templates->activeHooks();
/*echo "<pre>";
die(print_r($hooks));*/



foreach ($hooks as $hook) {
    add_hook($hook->name, 1, require_once ("hooks/{$hook->name}.php"), "");
}