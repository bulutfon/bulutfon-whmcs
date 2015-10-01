<?php
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/
include __DIR__.'/../../../configuration.php';
include __DIR__.'/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use Bulutfon\Libraries\Helper;
use Bulutfon\Libraries\Repository;
use Bulutfon\OAuth2\Client\Provider\Bulutfon;
use League\OAuth2\Client\Token\AccessToken;


/**
 * Hooks directly activated. And we need to activate bulutfon with hooks too. But when module activated
 * without tokens and permission it wont work. 
 */
try {
    $activeHooks = Capsule::table('mod_bulutfon_smstemplates')->where('active', 1)->get();
    array_push($activeHooks,(object)['name'=>'AdminAreaHeadOutput']);
    array_push($activeHooks,(object)['name'=>'AdminAreaClientSummaryPage']);

    /**
     * We have to activate bulutfon for each hook.
     * It will be globally avalaible.
     */
    $repository = new Repository();
    $provider = new Bulutfon($repository->getKeys());
    $tokens = $repository->getTokens();
    $token = new AccessToken(Helper::decamelize($tokens));

    /**
     * Load active hooks.
     */
    foreach($activeHooks as $hooks) {
        add_hook($hooks->name, 1,require_once("hooks/{$hooks->name}.php"), "");
    } 
} catch (Exception $e) {
    
}


