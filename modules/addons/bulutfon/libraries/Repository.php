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
        $whmcsNumbers = Capsule::table('tblclients')->where('phonenumber','LIKE',"%$number%")->get();
        
        $bulutfonNumbers = Capsule::table('mod_bulutfon_phonenumbers')->where('phonenumber','LIKE',"%$number%")->union($whmcsNumbers)->get();

        return $bulutfonNumbers ? true : false;
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

        $numbers = ORM::for_table('tblclients')
            ->raw_query("SELECT
                            tblclients.phonenumber
                        FROM
                            tblclients
                        WHERE
                            tblclients.id=:id AND tblclients.phonenumber IS NOT NULL AND  tblclients.phonenumber <> ''

                        UNION

                        SELECT
                            mod_bulutfon_phonenumbers.phonenumber
                        FROM
                            mod_bulutfon_phonenumbers
                        WHERE
                            userid=:id AND mod_bulutfon_phonenumbers.phonenumber IS NOT NULL AND  mod_bulutfon_phonenumbers.phonenumber <> ''", array('id' =>$userid))->find_many();
        if($numbers){
            $arr = array();
            foreach($numbers as $number){
                array_push($arr,$number->phonenumber);
            }
            return $arr;
        }
        return false;
    }
}