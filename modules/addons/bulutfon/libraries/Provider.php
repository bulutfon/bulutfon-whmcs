<?php
namespace Bulutfon\Libraries;

use Bulutfon\OAuth2\Client\Provider\Bulutfon;
use League\OAuth2\Client\Grant\RefreshToken;
use League\OAuth2\Client\Token\AccessToken;
use Symfony\Component\HttpFoundation\Request;

class Provider{

    protected $repository;

    protected $request;

    protected $provider;

    protected $paths;

    public function __construct(Repository $repository,$paths)
    {
        $this->repository = $repository;

        $this->request =  Request::createFromGlobals();

        $this->paths = $paths;
    }

    /**
     * Check for tokens.
     */
    public function init()
    {
        $keys = $this->repository->getKeys();

        $this->provider = new Bulutfon($keys);

        if($this->request->get('code'))  $this->setAccessToken();

        if($this->request->get('refresh_token')) $this->setRefreshToken();

        Helper::json("Code not exists.");
    }

    /**
     * Set refresh token
     */
    private function setRefreshToken()
    {
        $token = new AccessToken(Helper::decamelize($this->repository->getTokens()));

        $tokens =$this->provider->getAccessToken('refresh_token',[
            'refresh_token' => $token->refreshToken
        ]);

        $token = array(
            'access_token' =>$tokens->accessToken,
            'refresh_token' =>$tokens->refreshToken,
            'expires' => $tokens->expires,
            'uid' => $tokens->uid
        );

        $this->repository->setTokens(json_encode($token));

        $this->redirect("{$this->paths['admin_url']}addonmodules.php?module=bulutfon&code={$this->request->get('code')}}");
    }

    /**
     * Set access token.
     */
    private function setAccessToken()
    {
        $token = $this->provider->getAccessToken('authorization_code', [
            'code' => $this->request->get('code'),
            'grant_type' => 'authorization_code'
        ]);

        $this->repository->setTokens(json_encode($token));

        $this->redirect("{$this->paths['admin_url']}addonmodules.php?module=bulutfon&code={$this->request->get('code')}&state={$this->request->get('state')}");
    }

    /**
     * Redirect to location
     *
     * @param $url
     */
    private function redirect($url)
    {
        header("Location: {$url}");
        exit;
    }
}