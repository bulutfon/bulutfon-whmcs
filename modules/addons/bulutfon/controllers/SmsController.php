<?php
namespace Xuma\Controllers;

class SmsController extends Controller
{
    public function index()
    {
        $this->view('sms/templates');
    }
}