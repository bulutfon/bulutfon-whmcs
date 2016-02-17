<?php
include __DIR__ . '/../../../configuration.php';
include __DIR__ . '/vendor/autoload.php';
require_once __DIR__ ."/core.php";
use Bulutfon\Libraries\Helper;
use Bulutfon\Libraries\Repository;
use Illuminate\Database\Capsule\Manager as Capsule;

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function bulutfon_config()
{
    $configarray = array(
        "name" => "Bulutfon WHMCS Addon",
        "description" => "Bulutfon WHMCS Addon",
        "version" => "1.0.1",
        "author" => "Hakan ERSU",
        "language" => "turkish",
        "fields" => array(
            "token" => array(
                "FriendlyName" => "Token",
                "token" => "Uygulama Anahtarı",
                "Type" => "text",
                "Size" => "60",
                "Description" => "Bulutfon API uygulama anahtarı.",
                "Default" => ""
            ),
            'env' => array(
                'FriendlyName' => 'Urun Ortami',
                'Type' => 'dropdown',
                'Options' => array(
                    'production' => 'Uretim Ortami',
                    'dev' => 'Gelistirme Ortami'
                ),
                'Description' => 'Gelistirme ortami secerek gonderilecek sms\'leri gonderilmeden gorebilirisiniz.',
            ),
            "smstitle" => array(
                "FriendlyName" => "SMS Basligi",
                "smstitle" => "Sms Basligi",
                "Type" => "text",
                "Size" => "36",
                "Description" => "Bulutfon Uzerinden gonderilecek sms'ler icin baslik. Bu basligin onaylanmis olmasi gerekmektedir.",
                "Default" => ""
            ),
        ),
    );

    return $configarray;
}

function bulutfon_activate()
{
    Capsule::schema()->create('mod_bulutfon_messagelog', function ($table) {
        $table->increments('id');
        $table->integer('userid');
        $table->string('gsm');
        $table->longText('message');
        $table->string('type');
        $table->timestamps();
    });

    Capsule::schema()->create('mod_bulutfon_smstemplates', function ($table) {
        $table->increments('id');
        $table->string('name', 64);
        $table->enum('type', array('client', 'admin'));
        $table->string('admingsm', 255);
        $table->string('template', 240);
        $table->string('variables', 500);
        $table->tinyInteger('active');
        $table->string('extra', 3);
        $table->text('description');
        $table->timestamps();
    });

    Capsule::unprepared(file_get_contents(__DIR__ . "/install/templates.sql"));

    return array('status' => 'success', 'description' => 'Bulutfon succesfully activated :)');
}

function bulutfon_deactivate()
{
    Capsule::schema()->dropIfExists('mod_bulutfon_smstemplates');
    Capsule::schema()->dropIfExists('mod_bulutfon_messagelog');
    return array('status' => 'success', 'description' => 'Bulutfon succesfully deactivated :(');
}

function bulutfon_output($vars)
{
    (new Xuma\App($vars['token']));
}
