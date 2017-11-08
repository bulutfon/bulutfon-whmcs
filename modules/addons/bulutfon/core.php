<?php
namespace Xuma;

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

        if (file_exists(__DIR__ ."/controllers/".ucwords($url).'Controller.php')) {
            $this->controller = $url;
        }

        require_once __DIR__ ."/controllers/".ucwords($this->controller).'Controller.php';

        $this->controller = "Xuma\\Controllers\\".ucwords($this->controller)."Controller";
        $this->controller = new $this->controller;
        $this->controller->token = $token;

        if (method_exists($this->controller, $method)) {
            $reflection = new ReflectionMethod($this->controller, $method);
            if ($reflection->isPublic()) {
                $this->method = $method;
            }
        }

        $this->init = call_user_func_array([$this->controller, $this->method], []);
    }
}
