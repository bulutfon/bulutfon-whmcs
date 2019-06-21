<?php


namespace WHMCS\Module\Addon\Bulutfon\Core;


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
    }

    public function get($url, $object = false)
    {
        $this->base_url .= $url;
        $this->setUrlParams();
        if ($object) {
            $response = $this->request($this->base_url);
            return json_encode(json_decode($response)->{$object});
        }
        return $this->request($this->base_url);
    }

    public function request($url, $method = 'GET', $data = false, $headers = false, $returnInfo = false) {
        $ch = curl_init();

        if($method == 'POST') {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            if($data !== false) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
        } else {
            if($data !== false) {
                if(is_array($data)) {
                    $dataTokens = array();
                    foreach($data as $key => $value) {
                        array_push($dataTokens, urlencode($key).'='.urlencode($value));
                    }
                    $data = implode('&', $dataTokens);
                }
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$data);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        if($headers !== false) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $contents = curl_exec($ch);

        $info =  $returnInfo ? curl_getinfo($ch) : false;

        curl_close($ch);

        return $returnInfo ? array('contents' => $contents, 'info' => $info) : $contents;

    }

    protected function setUrlParams()
    {
        $params = http_build_query($this->params);
        $this->base_url .= "?{$params}&access_token=".$this->token;
    }
}
