<?php

namespace WHMCS\Module\Addon\Bulutfon\Controllers;

use WHMCS\Module\Addon\Bulutfon\Core\Sms;

class SmsController extends Controller
{
    public function list()
    {
        $this->set('token', $this->token);
        $this->view('sms/list');
    }    
}
