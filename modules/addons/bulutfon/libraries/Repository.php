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
        $tokens = Capsule::table('mod_bulutfon_settings')->where('name','tokens')->first();
        if($tokens) {
            return Capsule::table('mod_bulutfon_settings')->where('name','tokens')->update(['value' => $token]);
        }
        return Capsule::table('mod_bulutfon_settings')->insert(['name'=>'tokens','value' => $token]);  
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

    public function findUserByTicketId($ticketID)
    {
        $user = Capsule::table('tbltickets')->where('tbltickets.id',$ticketID)->join('tblclients','tbltickets.userid','=','tblclients.id')->first();
        return $user;
    }

    public function findUserByOrderId($orderID)
    {
        $user = Capsule::table('tblorders')->where('tblorders.id',$orderID)->join('tblclients','tblorders.userid','=','tblclients.id')->first();
        return $user;
    }

    public function findUserByInvoiceId($invoiceID)
    {
        $user = Capsule::table('tblinvoices')->where('tblinvoices.id',$invoiceID)->join('tblclients','tblinvoices.userid','=','tblclients.id')->first();
        return $user;
    }

    public function findUserById($id)
    {
        $user = Capsule::table('tblclients')->where('id',$id)->first;
        return $user;
    }

    public function getFirstGsm($user)
    {
        //$user = $this->findUserByTicketId($ticketID);
        $numbers = $this->getUserNumbers($user->userid);

        //Actually it must be helper function 
        $gsm = false;
        foreach($numbers as $number){
            // Lets remove any alpha characters
            // then try to trim 9 and 0  (we will send message only turkey atm.)
            $temp = ltrim(ltrim(preg_replace("/[^0-9]/", "", $number),9),0);
            if(strlen($temp)==10 && $temp[0]==5){
                // we were checked whmcs database first if any gsm numbers
                // setted whmcs number will return first.
                // and checked is number start with 5. I am not expert about
                // gsm numbers so for now we will only send messages to number starts with 5.
                //lets add 90
                $gsm = '90'.$temp;
                break;
            }
        }
        return $gsm;
    }

    public function getSmsMessage($name,$variables)
    {
        $template = Capsule::table('mod_bulutfon_smstemplates')->where('name',$name)->first();
        $replacefrom = explode(',',$template->variables);
        $replaceto = $variables;
        $message = str_replace($replacefrom,$replaceto,$template->template);
        return $message;
    }

    public function activeHooks()
    {
        $activeHooks = Capsule::table('mod_bulutfon_smstemplates')->where('active', 1)->get();
        array_push($activeHooks,(object)['name'=>'AdminAreaHeadOutput']);
        array_push($activeHooks,(object)['name'=>'AdminAreaClientSummaryPage']);
        return $activeHooks;
    }

    public function getTitle()
    {
        $title = Capsule::table('mod_bulutfon_settings')->where('name','title')->first();
        return $title ? $title->value : 'FIRMA';
    }
}