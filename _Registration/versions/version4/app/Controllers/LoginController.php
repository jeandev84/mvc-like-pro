<?php
namespace App\Controllers;


use App\Models\User;
use Framework\Security\Auth;
use Framework\Http\Request;
use Framework\Routing\Controller;
use Framework\Sessions\Session;
use Framework\Templating\View;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends Controller
{

    /**
     * Show the login page
     *
     * @path access by: /login/new or /login
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public function newAction()
     {
          View::renderTemplate('Login/new.html');
     }


    /**
     * Log in a user
     * (login: john@gmail.com, password: 123456)
     *
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public function createAction()
     {
         /*
         echo($_REQUEST['email'] . ', '. $_REQUEST['password']);
         $user = User::findByEmail($_POST['email']);
         debug($user); var_dump($user);
         */
         $email = isset($_POST['email']) ? $_POST['email'] : null;
         $password = isset($_POST['password']) ? $_POST['password'] : null;

         $user = User::authenticate($email, $password);

         // if user authenticate correctly, we'll redirect to home page
         if($user)
         {
             // Authentication user
             Auth::login($user);

             // redirect back() to home page
             # $this->redirect('/');
             $this->redirect(Auth::getReturnToPage());

         }else{
             View::renderTemplate('Login/new.html', [
                 'email' => $_POST['email']
             ]);
         }

         debug(Session::all());
     }


    /**
     * Log out a user
     * @path : /login/destroy or logout
     * @return void
     */
     public function destroyAction()
     {
          // logout user
          Auth::logout();

          // Redirect to home page (back())
          $this->redirect('/');
     }
}