<?php
namespace Xuma\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $results = $this->client($this->token)->get('cdrs');

        $this->set('hakan', 'ersu');
        return $this->view('index');
    }
}