<?php

namespace WHMCS\Module\Addon\Bulutfon\Controllers;

use Symfony\Component\HttpFoundation\Request;
use WHMCS\Module\Addon\Bulutfon\Core\Client;

class Controller
{
    public $settings = [
        'templatefile' => 'templates/',
        'vars' => [
            'message' => '',
            'flash' => false,
        ],
    ];
    protected $request;

    protected $smarty;

    protected $client;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->setSmarty();
    }

    /**
     * Set view.
     *
     * @param string $view
     *
     * @return array
     */
    public function view($view = 'index')
    {
        $this->smarty->display($view.'.tpl');
    }

    public function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Set smarty values.
     *
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->smarty->assign($key, $value);
    }

    /**
     * Redirect to an url.
     *
     * @param $url
     */
    public function redirect($url)
    {
        header("Location:{$url}");
        exit;
    }

    /**
     * Create request from given url.
     *
     * @param $url
     * @param bool|false $params
     *
     * @return array
     */
    public function get($url, $params = false)
    {
        try {
            $results = $this->client->request('GET', $url);
        } catch (\Exception $e) {
            $results = ['error' => 'Api error.'];
        }

        return $results;
    }

    /**
     * Guzzle client for requests.
     *
     * @param $token
     * @param bool|false $params
     *
     * @return Client
     */
    public function client($token, $params = false)
    {
        $query = ['access_token' => $token];

        if ($params) {
            $query = array_merge($query, $params);
        }

        $client = new Client($token, $params);

        $client->base_url = 'https://api.bulutfon.com/';

        return $client;
    }

    /**
     * Helper for setting pagination variables.
     *
     * @param $page
     */
    protected function paginate($page)
    {
        $previous = ($page > 1) ? ($page - 1) : 1;
        $next = $page + 1;
        $this->set('previous', $previous);
        $this->set('next', $next);
        $this->set('page', ($page > 1 ? $page : 1));
    }

    /**
     * Set smarty options.
     */
    private function setSmarty()
    {
        $this->smarty = new \Smarty();
        $this->smarty->template_dir = __DIR__.'/../../templates/';
        $this->smarty->compile_dir = $GLOBALS['templates_compiledir'];
    }

    public function dd($data)
    {
        echo '<pre>';
        print_r($data);
        exit;
    }
}
