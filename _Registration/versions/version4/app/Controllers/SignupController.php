<?php
namespace App\Controllers;


use App\Models\User;
use Framework\Http\Redirect;
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
         $user = new User($_POST);

         if($user->save())
         {
             /* View::renderTemplate('Signup/success.html'); */
             Redirect::to('/signup/success');
         }else{
              /* debug($user->errors); */
              View::renderTemplate('Signup/new.html', [
                  'user' => $user
              ]);
         }
     }


    /**
     * Show the signup success page
     *
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public function successAction()
     {
          View::renderTemplate('Signup/success.html');
     }
}