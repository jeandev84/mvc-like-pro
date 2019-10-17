<?php
namespace App\Controllers;


use App\Models\User;
use Framework\Routing\Controller;
use Framework\Templating\View;


/**
 * Class SignupController
 * @package App\Controllers
 */
class SignupController extends Controller
{

    /**
     * Show the signup page
     *
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public function newAction()
     {
          View::renderTemplate('Signup/new.html');
     }


    /**
     * Sign up a new user
     *
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public function createAction()
     {
          /* debug($_POST); */
         $user = new User($_POST);
         $user->save();

         View::renderTemplate('Signup/success.html');
     }
}