<?php
namespace Xuma\Libraries;

use StringTemplate\Engine;
use Curl\Curl;
use Illuminate\Database\Capsule\Manager as DB;

class Sender extends User
{
    protected $data;

    protected $logger;

    protected $token;

    protected $env;

    protected $title;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    /**
     * Get necessary values from given type of data.
     * @param $data
     * @param $type
     * @return $this
     */
    public function find($data, $type)
    {
        switch ($type) {
            case 'invoiceid':
                $this->userFromInvoice($data[$type]);

                break;
            case 'userid':
                $this->userById($data[$type]);

                break;
            case 'ticketid':
                $this->userFromTicket($data[$type]);

                break;
            case 'orderid':
                $this->userFromOrder($data[$type]);

                break;
            default:
                break;
        }

        // Merge hook data with user.
        $this->user = array_merge((array)$this->user, $data);

        return $this;
    }

    /**
     * Send SMS.
     * @param $message
     * @return bool|void
     */
    public function send($message)
    {
        $this->getSettings();

        $number = $this->formatPhoneNumber($this->user['phonenumber']);

        if (!$number || $this->title == "") {
            return false;
        }

        if (isset($this->user['setting'])) {
            $userSetting = json_decode($this->user['setting']);
            if ($userSetting->all == 1 || $userSetting->{$message} == 0) {
                return false;
            }
        }

        $data = [
            'title' => $this->title,
            'content' => $this->getMessage($message),
            'receivers' => $number
        ];

        if ($this->env == 'dev') {
            $this->logMessage($this->user['userid'], $this->getMessage($message), 'debug', $number);

            return;
        }

        $curl = new Curl();
        $data = array_merge($data, ['access_token' => $this->token]);
        $curl->post('http://api.bulutfon.com/messages', $data);

        $this->logMessage($this->user['userid'], $this->getMessage($message), 'bulutfon', $number);

        return true;
    }

    /**
     * Get all bulufon settings from database.
     *
     */
    protected function getSettings()
    {
        $settings = DB::table('tbladdonmodules')
            ->where('module', 'bulutfon')
            ->get();

        foreach ($settings as $setting) {
            if ($setting->setting == 'token') {
                $this->token = $setting->value;
            }

            if ($setting->setting == 'env') {
                $this->env = $setting->value;
            }

            if ($setting->setting == 'smstitle') {
                $this->title = $setting->value;
            }
        }
    }

    /**
     * Get template from db. TODO: Similar db functions
     * must be extracted.
     * @param $name
     * @return mixed|string
     */
    protected function getMessage($name)
    {
        $message = DB::table('mod_bulutfon_smstemplates')
            ->where('name', $name)
            ->first();

        return $this->parseTemplate($message);
    }

    /**
     * Parse template file.
     * @param $template
     * @return mixed|string
     */
    protected function parseTemplate($template)
    {
        $engine = new Engine();
        $sms = $engine->render($template->template, $this->user);

        return $sms;
    }

    /**
     * Format phone number.
     * @param $number
     * @return bool|string
     */
    protected function formatPhoneNumber($number)
    {
        // Just simple number checking.
        $number = ltrim(ltrim(preg_replace("/[^0-9]/", "", $number), 9), 0);
        if (strlen($number) == 10 && $number[0] == 5) {
            return "90{$number}";
        }

        return false;
    }

    /**
     * Log message to database.
     * @param $userid
     * @param $message
     * @param $type
     * @param $gsm
     * @return bool
     */
    protected function logMessage($userid, $message, $type, $gsm)
    {
        DB::table('mod_bulutfon_messagelog')->insert([
            'userid' => $userid,
            'message' => $message,
            'type' => $type,
            'gsm' => $gsm
        ]);

        return true;
    }

    /**
     * Testing function.
     * @param $data
     */
    private function dd($data)
    {
        echo "<pre>",var_dump($data);
        die();
    }
}
