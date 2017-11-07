<?php
namespace Xuma\Libraries;

use Curl\Curl;

/**
 * Mocking guzzle, i dont want to change
 * codes in other parts of the application
 */
class Client
{
    public $base_url = '';

    protected $token;
    
    protected $params;

    protected $client;

    protected $response;

    public function __construct($token, $params = false)
    {
        $this->token = $token;
        $this->params = $params;
        $this->client = new Curl();
    }

    public function get($url)
    {
        $this->base_url .= $url;
        $this->setUrlParams();

        return $this->client->get($this->base_url);
    }

    public function request($type, $url)
    {
        $type = strtolower($type);

        return $this->{$type}($url);
    }

    protected function setUrlParams()
    {
        $params = http_build_query($this->params);
        $this->base_url .= "?{$params}&access_token=".$this->token;
    }
}
