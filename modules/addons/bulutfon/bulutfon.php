<?php

use Bulutfon\Libraries\Helper;
use Bulutfon\Libraries\Repository;
use Bulutfon\OAuth2\Client\Provider\Bulutfon;
use League\OAuth2\Client\Token\AccessToken;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

if (!defined("WHMCS")) die("This file cannot be accessed directly");

function bulutfon_config(){
    $configarray = array(
        "name" => "Bulutfon WHMCS Addon",
        "description" => "Bulutfon WHMCS Addon",
        "version" => "0.0.2",
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
    $query = "CREATE TABLE  IF NOT EXISTS `mod_bulutfon_phonenumbers` ( `id` INT(11) NOT NULL AUTO_INCREMENT,  `userid` INT(11) NOT NULL,`phonenumber` VARCHAR(20) NOT NULL, UNIQUE (phonenumber),PRIMARY KEY id(id))";
    mysql_query($query);

    $query = "CREATE TABLE  IF NOT EXISTS `mod_bulutfon_tokens` (`tokens` TEXT NOT NULL)";
    mysql_query($query);

    return array('status'=>'success','description'=>'Bulutfon succesfully activated :)');
}

function bulutfon_deactivate(){
    $query = "DROP TABLE `mod_bulutfon_phonenumbers`";
    mysql_query($query);

    $query = "DROP TABLE `mod_bulutfon_tokens`";
    mysql_query($query);

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

    require_once "init.php";

    dd($xuma);

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
