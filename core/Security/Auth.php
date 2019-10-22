<?php
namespace Framework\Security;


use App\Models\User;
use Framework\Sessions\Session;


/**
 * Authentification class
 *
 * Class Auth
 * @package Framework\Security
 */
class Auth
{
     /**
      * Login the user
      *
      * @param User $user The user model
      *
      * @return void
      */
      public static function login(User $user)
      {
          // set true for delete all sessions
          session_regenerate_id(true);

          // store user identification in session
          Session::set('user_id', $user->id);
      }


     /**
      * Logout the user
      *
      * @return void
     */
      public static function logout()
      {
          // Unset all of the session variable
          Session::clear(); // $_SESSION = [];

          // Delete the session cookie
          if(ini_get('session.use_cookies'))
          {
              $params = session_get_cookie_params();

              setcookie(
                  session_name(),
                  '',
                  time() - 42000,
                  $params['path'],
                  $params['domain'],
                  $params['secure'],
                  $params['httponly']
              );
          }

          // Finalyy destroy the session
          session_destroy();
      }


      /**
       * Return indicator of whether a user is logged in or not
       *
       * @return boolean
       */
       /*
       public static function isLoggedIn()
       {
           # isset($_SESSION['user_id'])
           return Session::has('user_id');
       }
       */


      /**
       * Remember the originally-requested page in the session
       *
       * @return voidd
       * @throws \Exception
      */
       public static function rememberRequestedPage()
       {
            $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
       }



       /**
        * Get the originally-requested page to return to after requireing login, default page to the homepage
        *
        * @return void
        */
       public static function getReturnToPage()
       {
            return $_SESSION['return_to'] ?? '/';
       }


       /**
        * Get the current logged-in-user, from the session or the remember-me-cookie
        *
        * @return mixed The user model or null if not logged in
        */
       public static function getUser()
       {
             if(isset($_SESSION['user_id']))
             {
                 return User::findByID($_SESSION['user_id']);
             }
       }

}