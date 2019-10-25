<?php
namespace App\Controllers;


use App\Models\User;
use Framework\Security\Auth;
use Framework\Http\Request;
use Framework\Routing\Controller;
use Framework\Services\Flash;
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
          View::renderTemplate('Login/new.html', [
              'message' => $_GET['message'] ?? ''
          ]);
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
         $request = new Request();
         $email = $request->post('email');
         $password = $request->post('password');
         $remember_me = isset($_POST['remember_me']);

         // debug
         /* debug($request->post()); */

         // authenticate user
         $user = User::authenticate($email, $password);

         // if user authenticate correctly, we'll redirect to home page
         if($user)
         {
             // Authentication user
             Auth::login($user, $remember_me);

             // Remember the login here

             //

             // Flash message
             Flash::addMessage('Login successful');

             // redirige l'utilisateur vers l'adresse qui a ete au par avant tape.
             $this->redirect(Auth::getReturnToPage());

         }else{

             Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);

             View::renderTemplate('Login/new.html', [
                 'email' => $request->post('email'),
                 'remember_me' => $remember_me
             ]);
         }

         /* debug(Session::all()); */
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

          // Redirect
          $this->redirect('/login/show-logout-message');
     }

    /**
      * Show a "logged out" flash message and redirect to the homepage. Necessary to use the flash messages
      * as they use the session and at the end of the logout method (destroyAction) the session is destroyed
      * so a new action needs to be called in order to use the session.
      *
      * @url  /login/show-logout-message
      * @return void
     */
     public function showLogoutMessageAction()
     {
         // Add Message Flash
         Flash::addMessage('Logout successful');

         // Redirect to '/'
         $this->redirect('/');
     }
}