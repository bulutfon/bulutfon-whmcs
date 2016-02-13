<?php
namespace Xuma\Controllers;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Controller
{
    protected $request;

    public $settings = [
        'templatefile'=>'templates/',
        'vars' => [
            'message'=>'',
            'flash'=> false
        ]
    ];

    protected $smarty;
    protected $client;


    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->setSmarty();
    }

    /**
     * Set view.
     * @param string $view
     * @return array
     */
    public function view($view='index')
    {
        $this->smarty->display($view.'.tpl');
    }

    /**
     * Set smarty options.
     */
    private function setSmarty()
    {
        $this->smarty = new \Smarty();
        $this->smarty->template_dir = __DIR__.'/../templates/';
        $this->smarty->compile_dir = $GLOBALS['templates_compiledir'];
    }

    /**
     * Set smarty values.
     * @param $key
     * @param $value
     */
    public function set($key,$value)
    {
        $this->smarty->assign($key, $value);
    }

    /**
     * Redirect to an url.
     * @param $url
     */
    public function redirect($url)
    {
        header("Location:{$url}");

        exit;
    }

    public function get($url,$params = false)
    {
        try {
            $response = $this->client->request('GET',$url);
            $results = $response->getBody()->getContents();
        } catch (Exception $e) {
            $results = ['error'=>'Api error.'];
        }
        return $results;
    }

    public function client($token,$params = false)
    {
        $query =  ['access_token' => $token];

        if ($params) {
            $query = array_merge($query, $params);
        }

        $client = new Client([
            'base_uri' => 'http://api.bulutfon.com/',
            'query'   => $query,
            'debug'=> false
        ]);

        $this->client = $client;
        return $this;
    }
}
