<?php
namespace Framework\Http;


/**
 * Class Redirect
 * @package Framework\Http
 */
class Redirect
{

    /**
     * @param bool $http
     */
    public static function to($path = false)
    {
         if($path)
         {
             $url = sprintf('http://%s/%s', $_SERVER['HTTP_HOST'], trim($path, '/'));
             header(sprintf('Location : %s', $url), true, 303);
             exit;
         }
    }
}