<?php
namespace Bulutfon\Libraries;

class Helper
{
	public static function isAjax()
	{
        return ( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest' );
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
