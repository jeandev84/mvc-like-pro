<?php
namespace Framework\Routing;


use Exception;
use Framework\Http\Redirect;

/**
 * Base Controller
 * Class Controller
 *
 * @package Framework\Routing
 */
abstract class Controller
{
     /**
      * Parameters from the matched route
      * @var array
      */
     protected $route_params = [];


     /**
      * Controller constructor.
      *
      * @param $route_params Parameters from the route
      *
      * @return void
     */
     public function __construct($route_params)
     {
         $this->route_params = $route_params;
     }

    /**
     * Si la methode comporte un prefix 'Action'
     * et qu'il existe la methode before et after
     * alors elle sera automatiquement appele
     *
     * par defaut, les methodes non prefixees peuvent etre appelees.
     * @param $name
     * @param $args
     * @throws Exception
     */
     public function __call($name, $args)
     {
           $method = $name . 'Action';

           if(method_exists($this, $method))
           {
               if($this->before() !== false)
               {
                   call_user_func_array([$this, $method], $args);
                   $this->after();
               }
           }else{
               throw new Exception(
                   printf('Method %s not found in controller %s', $method, get_class($this))
               );
           }
     }


     /**
      * Before filter - called before an action method.
      *
      * @return void
      */
     protected function before() {}


     /**
      * After filter - called after an action method.
      *
      * @return void
     */
     protected function after() {}


     /**
      * Redirect to different page
      *
      * @param string $url The relative URL
      *
      * @return void
      */
      public function redirect($url)
      {
            return Redirect::to($url);
      }

}