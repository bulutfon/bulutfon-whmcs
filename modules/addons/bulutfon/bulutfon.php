<?php

include __DIR__.'/../../../configuration.php';

require_once __DIR__.'/core.php';
use Illuminate\Database\Capsule\Manager as Capsule;

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

function bulutfon_config()
{
    $configarray = [
        'name' => 'Bulutfon WHMCS Addon',
        'description' => 'Bulutfon WHMCS Addon',
        'version' => '2.0.0',
        'author' => 'Hakan ERSU',
        'language' => 'turkish',
        'fields' => [
            'token' => [
                'FriendlyName' => 'Token',
                'token' => 'Uygulama Anahtarı',
                'Type' => 'text',
                'Size' => '60',
                'Description' => 'Bulutfon API uygulama anahtarı.',
                'Default' => '',
            ],
            'env' => [
                'FriendlyName' => 'Urun Ortami',
                'Type' => 'dropdown',
                'Options' => [
                    'production' => 'Uretim Ortami',
                    'dev' => 'Gelistirme Ortami',
                ],
                'Description' => 'Gelistirme ortami secerek gonderilecek sms\'leri gonderilmeden gorebilirisiniz.',
            ],
            'smstitle' => [
                'FriendlyName' => 'SMS Basligi',
                'smstitle' => 'Sms Basligi',
                'Type' => 'text',
                'Size' => '36',
                'Description' => "Bulutfon Uzerinden gonderilecek sms'ler icin baslik. Bu basligin onaylanmis olmasi gerekmektedir.",
                'Default' => '',
            ],
        ],
    ];

    return $configarray;
}

function bulutfon_activate()
{
    // Capsule::schema()->dropIfExists('mod_bulutfon_smstemplates');
    // Capsule::schema()->dropIfExists('mod_bulutfon_messagelog');
    // Capsule::schema()->dropIfExists('mod_bulutfon_usersettings');

    // Capsule::schema()->create('mod_bulutfon_messagelog', function ($table) {
    //     $table->increments('id');
    //     $table->integer('userid');
    //     $table->string('gsm');
    //     $table->longText('message');
    //     $table->string('type');
    //     $table->timestamp('created_at')->useCurrent();
    //     $table->timestamp('updated_at')->default(Capsule::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
    // });

    // Capsule::schema()->create('mod_bulutfon_smstemplates', function ($table) {
    //     $table->increments('id');
    //     $table->string('name', 64);
    //     $table->enum('type', ['client', 'admin']);
    //     $table->string('admingsm', 255);
    //     $table->string('template', 240);
    //     $table->string('variables', 500);
    //     $table->tinyInteger('active');
    //     $table->string('extra', 3);
    //     $table->text('description');
    //     $table->timestamp('created_at')->useCurrent();
    //     $table->timestamp('updated_at')->default(Capsule::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
    // });

    // Capsule::schema()->create('mod_bulutfon_usersettings', function ($table) {
    //     $table->increments('id');
    //     $table->integer('clientid')->unique();
    //     $table->string('setting');
    // });

    // Capsule::unprepared(file_get_contents(__DIR__.'/install/templates.sql'));

    return ['status' => 'success', 'description' => 'Bulutfon succesfully activated :)'];
}

function bulutfon_deactivate()
{
    // Capsule::schema()->dropIfExists('mod_bulutfon_smstemplates');
    // Capsule::schema()->dropIfExists('mod_bulutfon_messagelog');
    // Capsule::schema()->dropIfExists('mod_bulutfon_usersettings');

    return ['status' => 'success', 'description' => 'Bulutfon succesfully deactivated :('];
}

function bulutfon_output($vars)
{
    (new WHMCS\Module\Addon\Bulutfon\App($vars['token']));
}

// function bulutfon_clientarea($vars)
// {
//     $hooks = Capsule::table('mod_bulutfon_smstemplates')->get();
//     $settings = Capsule::table('mod_bulutfon_usersettings')->where('clientid', $_SESSION['uid'])->first();
//     $postArray = [];

//     if ($_POST) {
//         foreach ($hooks as $hook) {
//             $postArray[$hook->name] = isset($_POST[$hook->name]) ? 1 : 0;
//         }
//         $postArray['all'] = isset($_POST['all']) ? 1 : 0;
//         $postArray = json_encode($postArray);

//         Capsule::statement('INSERT INTO mod_bulutfon_usersettings (clientid,setting) VALUES(?,?) ON DUPLICATE KEY UPDATE setting = ?', [
//             $_SESSION['uid'],
//             $postArray,
//             $postArray,
//         ]);

//         header('Location:index.php?m=bulutfon');
//     }

//     return [
//         'pagetitle' => 'SMS Bildirim Ayarlari',
//         'breadcrumb' => ['index.php?m=bulutfon' => 'SMS Ayarlari'],
//         'templatefile' => 'templates/clientarea/index',
//         'requirelogin' => true,
//         'vars' => [
//             'hooks' => $hooks,
//             'settings' => (array) json_decode($settings->setting),
//         ],
//     ];
// }
