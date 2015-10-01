<?php
namespace Bulutfon\Libraries;

use Illuminate\Database\Capsule\Manager as Capsule;

class Repository{

    /**
     * Get bulutfon api keys from module settings
     * table.
     *
     * @return array
     */
    public function getKeys()
    {
        $settings = Capsule::table('tbladdonmodules')->where('module', 'bulutfon')->get();
        
        $callbackUrl = Capsule::table('tblconfiguration')->where('setting', 'SystemURL')->first();
        
        $callbackUrl = rtrim(preg_replace("/^http:/i", "https:", $callbackUrl->value),'/').'/modules/addons/bulutfon/callback.php';
        
        $fields = array('clientId','clientSecret','verifySSL');

        $keys = array('redirectUri'=>$callbackUrl);

        foreach($settings as $key) {
            if(in_array($key->setting, $fields)) {
                $keys[$key->setting] = $key->value;
            }
        }

        $keys['verifySSL'] = filter_var($keys['verifySSL'], FILTER_VALIDATE_BOOLEAN);
        
        return $keys;
    }

    /**
     * Set new tokens.
     *
     * @param $token
     */
    public function setTokens($token)
    {
        return Capsule::table('mod_bulutfon_settings')->where('name','tokens')->update(['value' => $token]);
    }

    /**
     * Get tokens from table.
     *
     * @return array
     */
    public function getTokens()
    {
        $tokens = Capsule::table('mod_bulutfon_settings')->where('name', 'tokens')->first();
        return (array)json_decode($tokens->value);
    }

    /**
     * Delete a number from mod_bulutfon_phonumbers.
     * Whmcs numbers cant deleted for now.
     *
     * @param $number
     * @return mixed
     */
    public function deleteNumber($number)
    {
        return Capsule::table('mod_bulutfon_phonenumbers')->where('phonenumber',$number)->delete();
    }

    /**
     * Check number is exists in both whmcs tables and
     * bulutfon tables.
     *
     * @param $number
     * @param bool $list
     * @return bool
     */
    private function checkNumber($number,$list=false)
    {
        if($this->getUserNumbers($numbers) && count($this->getUserNumbers($numbers))>0) return true;
        return false;
    }

    /**
     * Add phone number to bulutfon mod database.
     * @param $userid
     * @param $number
     * @return bool
     */
    public function addNumber($userid,$number)
    {

        if($this->checkNumber($number)) return false;

        return Capsule::table('mod_bulutfon_phonenumbers')->insert(
            ['userid' => $userid, 'phonenumber' =>$number]
        );

    }

    /**
     * Get users phone numbers from whmcs and
     * bulutfon mod table.
     *
     * @param $userid
     * @return array|bool
     */
    public function getUserNumbers($userid)
    {
        $whmcs = Capsule::select("SELECT tblclients.phonenumber FROM tblclients WHERE tblclients.id=? AND tblclients.phonenumber IS NOT NULL AND  tblclients.phonenumber <> ''",[$userid]);
        $addon = Capsule::select("SELECT mod_bulutfon_phonenumbers.phonenumber FROM mod_bulutfon_phonenumbers WHERE userid=? AND mod_bulutfon_phonenumbers.phonenumber IS NOT NULL AND  mod_bulutfon_phonenumbers.phonenumber <> ''",[$userid]);
        // Cant find the union results with laravel raw queries.
        // its not ideal but dirty and fast.
        $numbers = [];
        foreach($whmcs as $n) array_push($numbers, $n->phonenumber);
        foreach($addon as $a) array_push($numbers, $a->phonenumber);
        
        return count($numbers)>0 ? $numbers : false;
    }
}