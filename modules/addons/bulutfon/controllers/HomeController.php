<?php
namespace Xuma\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $cdrs = $this->client($this->token)->get('cdrs');
        $this->set('cdrs', json_decode($cdrs)->cdrs);
        return $this->view('cdr');
    }
}