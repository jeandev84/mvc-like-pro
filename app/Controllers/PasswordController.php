<?php
namespace App\Controllers;


use App\Models\User;
use Framework\Routing\Controller;
use Framework\Templating\View;

/**
 * Class PasswordController
 * @package App\Controllers
 */
class PasswordController extends Controller
{
    /**
     * Show the forgotten password page
     *
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     *
     * @url http://localhost:8000/password/forgot
     * @return void
     */
     public function forgotAction()
     {
         View::renderTemplate('Password/forgot.html');
     }


    /**
     * Send the password reset link to the supplied email
     *
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public function requestResetAction()
     {
         $email = $_POST['email'] ?? null;
         User::sendPasswordReset($email);

         View::renderTemplate('Password/reset_requested.html');
     }
}