<?php
namespace Framework\Security;


use App\Models\RememberedLogin;
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
     * @param bool $remember_me
     * @return void
     */
      public static function login(User $user, $remember_me = false)
      {
          // set true for delete all sessions
          session_regenerate_id(true);

          // store user identification in session
          Session::set('user_id', $user->id);

          // if user checked remember_me, we'll store token in the database
          if($remember_me)
          {
               if($user->rememberLogin())
               {
                   setcookie('remember_me', $user->remember_token, $user->expiry_timestamp, '/');
               }
          }
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

          // Forget login
          static::forgetLogin();
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
     * @throws \Exception
     */
       public static function getUser()
       {
             if(isset($_SESSION['user_id']))
             {
                 return User::findByID($_SESSION['user_id']);

             }else{

                 return static::loginFromRememberCookie();
             }
       }


      /**
       * Login the user from a remembered login cookie
       *
       * @return mixed The user model if login cookie found: null otherwise
       * @throws \Exception
      */
      protected static function loginFromRememberCookie()
      {
           $cookie = $_COOKIE['remember_me'] ?? false;

           if($cookie)
           {
               $remembered_login = RememberedLogin::findByToken($cookie);

               if($remembered_login && ! $remembered_login->hasExpired())
               {
                    $user = $remembered_login->getUser();
                    static::login($user, false);
                    return $user;
               }
           }
       }


    /**
     * Forget the remembered login, if present
     *
     * @return void
     * @throws \Exception
     */
       protected static function forgetLogin()
       {
           $cookie = $_COOKIE['remember_me'] ?? false;

           if($cookie)
           {
               $remembered_login = RememberedLogin::findByToken($cookie);

               if($remembered_login)
               {
                   $remembered_login->delete();
               }
           }

           setcookie('remember_me', '', time() - 3600); // set to expire in the post
       }
}

# name, value, expire
/*
Set cookie:
setcookie('example', 'hello', time() + 60 * 60 * 24 * 2);
echo 'Cookie set.';
*/

/*
Delete cookie:
setcookie('example', '', time() - 3600);
echo 'Cookie deleted';
*/

/*
 * Set sub directory example and define domain path
 * setcookie('subdir_example', 'hello', time() + 60 * 60 * 24 * 2, '/');
 * echo 'Subdirectory cookie set';
 */