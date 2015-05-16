<?php
namespace Bulutfon\Libraries;

use ORM;

class Repository{

    /**
     * Get bulutfon api keys from module settings
     * table.
     *
     * @return array
     */
    public function getKeys()
    {
        $results = ORM::for_table('tbladdonmodules')->where('module', 'bulutfon')->findMany();
        $fields = array('clientId','clientSecret','redirectUri','verifySSL');
        $keys = array();
        foreach($results as $key){
            if(in_array($key->setting, $fields)){
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
        ORM::for_table('mod_bulutfon_tokens')->delete_many();

        $query = ORM::for_table('mod_bulutfon_tokens')->create();

        $query->tokens = $token;

        $query->save();
    }

    /**
     * Get tokens from table.
     *
     * @return array
     */
    public function getTokens()
    {
        $tokens = ORM::for_table('mod_bulutfon_tokens')->findOne();
        return (array)json_decode($tokens->tokens);
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
        $phone  = ORM::for_table('mod_bulutfon_phonenumbers')
            ->select('id')
            ->where('phonenumber',$number)
            ->find_one()
            ->delete();
        return $phone;
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
        $numbers = ORM::for_table('tblclients')
            ->raw_query("SELECT
                            tblclients.phonenumber
                        FROM
                            tblclients
                        WHERE
                            tblclients.phonenumber LIKE :phonenumber

                        UNION

                        SELECT
                            mod_bulutfon_phonenumbers.phonenumber
                        FROM
                            mod_bulutfon_phonenumbers
                        WHERE
                             mod_bulutfon_phonenumbers.phonenumber LIKE :phonenumber", array('phonenumber' =>"%$number%"))->find_many();

        if(count($numbers)>0) return true;

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

        $phone = ORM::for_table('mod_bulutfon_phonenumbers')->create();

        $phone->userid = $userid;

        $phone->phonenumber = $number;

        $phone->save();

        if($phone->id()) return true;

        return false;

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