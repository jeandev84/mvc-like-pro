<?php
namespace Framework\Http;


/**
 * Class Request
 * @package Framework\Http
 */
class Request
{
     /**
      * @return string
     */
     public static function getPath()
     {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
     }


     /**
      * @return mixed
     */
     public function requestMethod()
     {
         return $_SERVER['REQUEST_METHOD'];
     }

    /**
     * @param null $key
     * @return array|mixed
     */
     public function get($key = null)
     {
          return $this->getParam($key, $_GET);
     }

     /**
     * @param null $key
     * @return array|mixed
     */
     public function post($key = null)
     {
        return $this->getParam($key, $_POST);
     }


    /**
     * Server
     * @param null $key
     * @return array|mixed
     */
     public function server($key = null)
     {
         return $this->getParam($key, $_SERVER);
     }

    /**
     * Get URL
     * @param bool $path
     * @return string
     */
     public function url($path = false)
     {
         if($path) {
             $path = '/'. trim($path, '/');
         }
         return sprintf('http://%s%s', $_SERVER['HTTP_HOST'], $path);
     }

    /**
     * @param $key
     * @param array $data
     * @param null $default
     * @return array|mixed
     */
     private function getParam($key, array $data)
     {
         return isset($data[$key]) ? $data[$key] : $data;
     }


}
