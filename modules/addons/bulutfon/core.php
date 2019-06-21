<?php

namespace WHMCS\Module\Addon\Bulutfon;

use ReflectionMethod;

class App
{
    public $init;
    
    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];

    public function __construct($token)
    {
        $url = $this->controller;

        $method = $this->method;
       
        if (isset($_GET['action'])) {
            $url = filter_var(rtrim($_GET['action']), FILTER_SANITIZE_URL);
        }

        if (isset($_GET['work'])) {
            $method = filter_var(rtrim($_GET['work']), FILTER_SANITIZE_URL);
        }

        if (file_exists(__DIR__ ."/lib/Controllers/".ucwords($url).'Controller.php')) {
            $this->controller = $url;
        }
        
        require_once __DIR__ ."/lib/Controllers/".ucwords($this->controller).'Controller.php';
       
        $this->controller = "WHMCS\\Module\\Addon\\Bulutfon\\Controllers\\".ucwords($this->controller)."Controller";
        $this->controller = new $this->controller;
        $this->controller->token = $token;

        if (method_exists($this->controller, $method)) {
            try {
                $reflection = new ReflectionMethod($this->controller, $method);
                if ($reflection->isPublic()) {
                    $this->method = $method;
                }
            } catch (\ReflectionException $e) {
                exit('Controller not found');
            }

        }

        $this->init = call_user_func_array([$this->controller, $this->method], []);
    }
}
