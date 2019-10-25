<?php
namespace Framework\Sessions;


/**
 * Class Session
 * @package Framework\Sessions
 */
class Session
{

     /**
      * Start the session
     */
     public static function start()
     {
          session_start();
     }


     /**
      * @param $key
      * @param $value
     */
     public static function set($key, $value)
     {
          $_SESSION[$key] = $value;
     }


    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
     public static function get($key)
     {
          if(!self::has($key))
          {
               throw new \Exception(sprintf('This key (%s) does not setted yet!'), $key);
          }
          return $_SESSION[$key];
     }

    /**
     * @param $key
     * @return bool
     */
     public static function has($key)
     {
          return isset($_SESSION[$key]);
     }

     /**
      * Get all stored session
      * @return mixed
     */
     public static function all()
     {
         return $_SESSION;
     }

    /**
     * @param $key
     * @return void
     */
     public static function remove($key)
     {
         if(self::has($key))
         {
             unset($_SESSION[$key]);
         }
     }


    /**
     * Destroy all session
     */
     public static function destroy()
     {
          if(!empty($_SESSION))
          {
              session_destroy();
          }
     }

    /**
     * Remove all sessions
     */
     public static function clear()
     {
          $_SESSION = [];
     }

    /**
     * Flush session
     */
     public static function flush() {}

}