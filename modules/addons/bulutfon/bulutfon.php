<?php
include __DIR__.'/../../../configuration.php';
include __DIR__.'/vendor/autoload.php';

use Bulutfon\Libraries\Helper;
use Bulutfon\Libraries\Repository;
use Bulutfon\OAuth2\Client\Provider\Bulutfon;
use League\OAuth2\Client\Token\AccessToken;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\File;


if (!defined("WHMCS")) die("This file cannot be accessed directly");

function bulutfon_config(){
    $configarray = array(
        "name" => "Bulutfon WHMCS Addon",
        "description" => "Bulutfon WHMCS Addon",
        "version" => "0.1.0",
        "author" => "Bulutfon",
        "language" => "turkish",
        "fields" => array(
            "clientId" => array("FriendlyName"=>"cliendId", "clientId" => "Uygulama Anahtarı", "Type" => "text", "Size" => "60", "Description" => "Bulutfon API uygulama anahtarı.", "Default" => "" ),
            "clientSecret" => array("FriendlyName"=>"clientSecret","clientSecret" => "Gizli Anahtar", "Type" => "text", "Size" => "60", "Description" => "Bulutfon API gizli anahtarı.", "Default" => "" ),            
            "verifySSL"=>array("FriendlyName"=>"SSL Doğrulama","verifySSL"=>"SSL Doğrulama","Type"=>"dropdown","Options" =>"true,false","Description" => "SSL Doğrulaması")
        )
    );

    return $configarray;
}

function bulutfon_activate(){
    Capsule::schema()->create('mod_bulutfon_phonenumbers',function ($table) {
        $table->increments('id');
        $table->integer('userid');
        $table->string('phonenumber',20)->unique();
        $table->timestamps();
    });

    Capsule::schema()->create('mod_bulutfon_settings',function ($table) {
        $table->increments('id');
        $table->string('name',64)->unique();
        $table->longText('value');
        $table->timestamps();
    });

    Capsule::schema()->create('mod_bulutfon_smstemplates',function ($table) {
        $table->increments('id');
        $table->string('name',64);
        $table->enum('type', array('client', 'admin'));
        $table->string('admingsm',255);
        $table->string('template',240);
        $table->string('variables',500);
        $table->tinyInteger('active');
        $table->string('extra',3);
        $table->text('description');
        $table->timestamps();
    });

   Capsule::unprepared(file_get_contents(__DIR__."/install/templates.sql"));

    return array('status'=>'success','description'=>'Bulutfon succesfully activated :)');
}

function bulutfon_deactivate(){
    Capsule::schema()->dropIfExists('mod_bulutfon_phonenumbers');
    Capsule::schema()->dropIfExists('mod_bulutfon_settings');
    Capsule::schema()->dropIfExists('mod_bulutfon_smstemplates');

   

    return array('status'=>'success','description'=>'Bulutfon succesfully deactivated :(');
}

function bulutfon_upgrade(){

}

function bulutfon_smarty(){
    $smarty = new Smarty();

    $smarty->template_dir = __DIR__.'/templates/';

    $smarty->compile_dir = $GLOBALS['templates_compiledir'];

    return $smarty;
}

function bulutfon_output($vars){
   
    $repository = new Repository();

    $request = Request::createFromGlobals();

    $provider = new Bulutfon($repository->getKeys());

    $tokens = $repository->getTokens();

    $smarty = bulutfon_smarty();

    if($tokens){
        $token = new AccessToken(Helper::decamelize($tokens));
    } else {
        Helper::outputIfAjax("<a href='{$provider->getAuthorizationUrl()}' class='button'>Yetkilendir.</a>");
        Helper::redirect($provider->getAuthorizationUrl());
    }

    switch($request->get('tab','default')){

        case 'delete':

            $phone = (int)$request->get('number',false);

            if($repository->deleteNumber($phone)) Helper::json('deleted');

            Helper::json('failed');

            break;
        case 'sms-templates';
            $templates = Capsule::table('mod_bulutfon_smstemplates')->get();
            $id = (int)$request->get('id',false);
            if($id){
                $smarty->assign('selected',$id);
            }
            if(isset($_GET['active'])) {
                 Capsule::table('mod_bulutfon_smstemplates')->where('id',$id)->update([
                    'active'=> (int)$request->get('active',false)
                ]);
                if($request->get('back',false) == 'list'){
                    header("location: addonmodules.php?module=bulutfon&tab=sms-templates");
                }else {
                    header("location: addonmodules.php?module=bulutfon&tab=sms-templates&id={$id}");
                }
               
            }
            if($request->get('template',false)) {
                Capsule::table('mod_bulutfon_smstemplates')->where('id',$id)->update([
                    'template'=> $request->get('template',false)
                ]);
                header("location: addonmodules.php?module=bulutfon&tab=sms-templates&id={$id}");
             
            }
            $smarty->assign('templates',$templates);
            $smarty->display('sms_templates.tpl');
        break;
        case 'sms-settings';
            if($request->get('sms-basligi') && ctype_alpha($request->get('sms-basligi')) && strlen($request->get('sms-basligi'))>=3 && strlen($request->get('sms-basligi'))<12) {
               Capsule::table('mod_bulutfon_settings')->where('name','title')->update([
                    'value'=> $request->get('sms-basligi')
                ]);
               header("Location: addonmodules.php?module=bulutfon&tab=sms-settings");
            }
            $smarty->assign('title',$repository->getTitle());
            $smarty->display('sms_settings.tpl');
        break;
        case 'addtouser':

            $smarty->assign('number',$request->get('number'));

            if($request->get('clientid')){
                $validator = new Valitron\Validator($_POST);

                $rules= array(
                    'required'=>array(
                        array('telefon-numarasi'),
                        array('clientid'),
                        array('value')
                    ),
                    'integer'=>array(
                        array('telefon-numarasi'),
                        array('clientid')
                    ),
                    'lengthMin'=>array(
                        array('telefon-numarasi',10)
                    ),
                    'lengthMax'=>array(
                        array('telefon-numarasi',20)
                    )
                );

                $validator->rules($rules);

                function show_errors($array,$value,$smarty){
                    $errors = "<div style='color: #a94442;background-color: #f2dede;border:1px solid #ebccd1;padding:5px'><ul style='padding:0'>";
                    if(isset($array)){
                        foreach($array as $e){
                            $errors.= "<li>{$e}</li>";
                        }
                        $smarty->assign($value,"{$errors}</ul></div>");
                    }
                }

                if($validator->validate()) {

                    $add = $repository->addNumber(
                        $request->get('clientid'),
                        $request->get('telefon-numarasi')
                    );

                    if($add){
                        $smarty->assign('success','Kayıt başarıyla eklenmiştir.');
                    } else {
                        $errors =array();
                        $errors['telefon-numarasi'] = array('Bu telefon numarası zaten kayıtlı.');
                        show_errors($errors['telefon-numarasi'],'telefon',$smarty);
                        $smarty->assign('number',$request->get('telefon-numarasi'));
                    }

                } else {
                    // really hate smarty and i am a bit lazy.
                    $errors = $validator->errors();
                    // it must be handled by smarty but i cant figure out
                    show_errors($errors['telefon-numarasi'],'telefon',$smarty);
                    show_errors($errors['clientid'],'user',$smarty);
                    show_errors($errors['value'],'user',$smarty);
                }
            }

            $smarty->display('adduser.tpl');
            break;
        default:

            $page = $request->get('page',1);

            $userid = $request->get('userid');

            // 100 results a bit overkill setted to 10.
            $filters = array('limit' => (int)$request->get('limit',10));

            $fields = true;

            if($userid){

                $smarty->assign('userid',$userid);

                $numbers = $repository->getUserNumbers($userid);

                if(!$numbers) Helper::json("<p>Kayıtlı telefon numarası bulunamadı.</p>");

                $smarty->assign('userNumbers',$numbers);

                foreach($numbers as $number){
                    if(strlen($number)>9 && strlen($number)<12){
                        array_push($numbers,'90'.ltrim($number,'0'));
                    }        
                }
                
                $numbers = Helper::imp($numbers);

                $filters['caller_or_callee'] = $numbers;
            }

            $smarty->assign('cdrs',$provider->getCdrs($token, $filters, $page)->cdrs);

            $smarty->assign('fields',$fields);

            $smarty->assign('page',$page);

            $smarty->assign('limit',(int)$request->get('limit',10));

            Helper::outputIfAjax($smarty->fetch('cdr.tpl'));

            $smarty->display('cdr.tpl');

            break;
    }
}
