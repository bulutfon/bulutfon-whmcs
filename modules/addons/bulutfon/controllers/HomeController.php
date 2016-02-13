<?php
namespace Xuma\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $cdrs = json_decode($this->client($this->token,['limit'=>200])->get('cdrs'))->cdrs;
        //echo "<pre>",die(print_r(json_encode($cdrs)));
        $this->set('cdrs', json_encode($cdrs));
        return $this->view('cdr');
    }

    public function templates()
    {
        return $this->view('index');
    }
}