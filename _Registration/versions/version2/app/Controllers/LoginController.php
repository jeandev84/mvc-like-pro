<?php
namespace App\Controllers;


use App\Models\User;
use Framework\Routing\Controller;
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
     *
     * @return void
     */
     public function createAction()
     {
         /* echo($_REQUEST['email'] . ', '. $_REQUEST['password']); */

         $user = User::findByEmail($_POST['email']);

         var_dump($user);
     }
}