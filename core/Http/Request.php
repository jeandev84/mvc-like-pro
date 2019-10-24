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
     * @param $key
     * @param array $data
     * @param null $default
     * @return array|mixed
     */
     private function getParam($key, array $data)
     {
         return isset($data[$key]) ? $data[$key] : $data;
     }


    private function getParamAndDefault($key, array $data, $default = null)
    {
        return isset($data[$key]) ? $data[$key] : $default;
    }
}