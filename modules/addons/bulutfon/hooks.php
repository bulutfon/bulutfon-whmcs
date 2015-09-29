<?php
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/

use Illuminate\Database\Capsule\Manager as Capsule;
include __DIR__.'/../../../configuration.php';
include __DIR__.'/vendor/autoload.php';

/**
 * Load Env values.
 * @var Dotenv
 */
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

/**
 * Get active hooks.
 */
$activeHooks = Capsule::table('mod_bulutfon_smstemplates')->where('active', 1)->get();
array_push($activeHooks,(object)['name'=>'AdminAreaHeadOutput']);
array_push($activeHooks,(object)['name'=>'AdminAreaClientSummaryPage']);

/**
 * Load active hooks.
 */
foreach($activeHooks as $hooks) {
    $hook = require_once("hooks/{$hooks->name}.php");
    add_hook($hook['hook'], 1, $hook['function'], "");
}

function sendPusherMessage($message){
    $pusher = new Pusher(
        getenv('PUSHER_KEY'),
        getenv('PUSHER_SECRET'),
        getenv('PUSHER_ID'),
        array('encrypted' => true)
    );
    $data['message'] = $message;
    $pusher->trigger('test_channel', 'my_event', $data);
}