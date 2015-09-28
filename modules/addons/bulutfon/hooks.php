<?php

/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/
include __DIR__.'/../../../configuration.php';
include __DIR__.'/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

/**
 * Just a placeholder.For clientarea.
 *
 * @param $vars
 * @return array|string
 */
 function bulutfonClientAreaOutput($vars) {
     $html_return = array();
     $html_return = "<div style='min-height:200px;display:none;'><img src='../modules/addons/bulutfon/assets/img/loader.gif' class='bulutfon-loader'/></div>";
     return $html_return;
 }

 add_hook("AdminAreaClientSummaryPage",1,"bulutfonClientAreaOutput");

/**
 * Adding bulutfon assets.
 *
 * @return string
 */
function header_output(){
    $head_return = '
        <link href="../modules/addons/bulutfon/assets/css/bulutfon.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../modules/addons/bulutfon/assets/js/bulutfon.js"></script>';
    return $head_return;
}
add_hook("AdminAreaHeadOutput",2,"header_output");

function sendPusherMessage($message){
    //include __DIR__.'/vendor/autoload.php';
   

    $pusher = new Pusher(
        getenv('PUSHER_KEY'),
        getenv('PUSHER_SECRET'),
        getenv('PUSHER_ID'),
        array('encrypted' => true)
    );
    $data['message'] = $message;
    $pusher->trigger('test_channel', 'my_event', $data);
}


/**
 * Get all hooks
 * @return array hooks added.
 */
function getHooks(){
    if ($handle = opendir(dirname(__FILE__).'/hooks')) {
        while (false !== ($entry = readdir($handle))) {
            if(substr($entry,strlen($entry)-4,strlen($entry)) == ".php"){
                $file[] = require_once('hooks/'.$entry);
            }
        }
        closedir($handle);
    }
    return $file;
}
$hooks = getHooks();

foreach($hooks as $hook){
    add_hook($hook['hook'], 1, $hook['function'], "");
}

