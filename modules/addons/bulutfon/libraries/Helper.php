<?php
namespace Bulutfon\Libraries;

class Helper
{
	public static function isAjax()
	{
        return ( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest' );
    }

    /**
     * Validate given session or sessions isset
     *
     * @param $sessions
     * @return bool
     */
    public static function checkSession($sessions)
    {
    	$status = true;

    	if(is_array($sessions)){
    		foreach($sessions as $session){
    			if(!isset($_SESSION[$session])) $status = false;
    		}
    		return $status;
    	}

    	return isset($_SESSION[$sessions]) ?: false;
    }

    /**
     * Get single session
     *
     * @param $session
     * @return bool
     */
    public static function getSession($session)
    {
    	return isset($_SESSION[$session]) ? $_SESSION[$session] : false;
    }

    /**
     * Set single session
     *
     * @param $key
     * @param $value
     */
    public static function setSession($key,$value)
    {
    	$_SESSION[$key] = $value;
    }

    /**
     * Exit and output as json response.
     * It is useful with whmcs structure.
     *
     * @param $html
     */
    public static function json($html)
    {
        header('Content-type: application/json');

        $output = json_encode($html);
        
        exit('{"html":'.$output.'}');
    }

    public static function outputIfAjax($html)
    {
        if(self::isAjax()) self::json($html);
    }

    public static function redirect($url)
    {
        header("Location: {$url}");
        exit;
    }

    public static function imp($array,$glue=',')
    {
        return implode($glue,$array);
    }
    /**
     * Get provider tokens from session
     *
     * @return array
     */
    public static function getTokens()
    {
        return [
            'access_token' =>self::getSession('accessToken'),
            'refresh_token' => self::getSession('refreshToken'),
            'expires' => self::getSession('expires'),
            'uid' => self::getSession('uid')
        ];
    }

    /**
     * Set provider session token.
     *
     * @param $token
     */
    public static function setTokens($token)
    {
        self::setSession('accessToken',$token->accessToken);
        self::setSession('refreshToken',$token->refreshToken);
        self::setSession('expires',$token->expires);
        self::setSession('uid',$token->uid); 
    }

    /**
     * Return an array from given variables.
     * It can be from database or whmcs config variable.
     *
     * @param $vars
     * @return array
     */
    public static function setVars($vars)
    {
        return [
            'clientId'      => $vars['clientId'],
            'clientSecret'  => $vars['clientSecret'],
            'redirectUri'   => $vars['redirectUri'],
            'verifySSL'     => filter_var($vars['verifySSL'], FILTER_VALIDATE_BOOLEAN)
        ];
    }

    public static function decamelize($camel,$splitter="_") {
        if(is_array($camel)){
            $new = array();
            foreach($camel as $key=>$value){
                $new[self::decamelize($key)] = $value;
            }
            return $new;
        }
        $camel=preg_replace('/(?!^)[[:upper:]][[:lower:]]/', '$0', preg_replace('/(?!^)[[:upper:]]+/', $splitter.'$0', $camel));
        return strtolower($camel);
    }
}
