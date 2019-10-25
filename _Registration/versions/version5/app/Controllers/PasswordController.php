<?php
namespace App\Controllers;


use App\Models\User;
use Framework\Http\Request;
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


    /**
     * Show the reset password form
     *
     * @path /password/reset/c02wqwe985w2d98rty46erwtyu34dgwqenjkhuio
     * @return void
     * @throws \Exception
     */
     public function resetAction()
     {
         $token = $this->route_params['token'];

         $user = User::findByPasswordReset($token); /* debug($user); */

         View::renderTemplate('Password/reset.html', [
             'token' => $token
         ]);

     }


    /**
     * Reset the user's password
     *
     * @path /password/reset-password
     * @return void
     * @throws \Exception
     */
     public function resetPasswordAction()
     {
         $request = new Request();
         $token = $request->post('token'); /* $token = $_POST['token']; */

         $user = $this->getUserOrExit($token);

         $password = $request->post('password');
         if($user->resetPassword($password))
         {
             View::renderTemplate('Password/reset_success.html');

         }else{

             View::renderTemplate('Password/reset.html', [
                 'token' => $token,
                 'user'  => $user
             ]);
         }

     }


    /**
     * Find the user model associated with the password reset token, or end the request with a message
     *
     * @param string $token Password reset token sent to user
     *
     * @return mixed User object if found and the token has'nt expired, null otherwise
     * @throws \Exception
     */
      protected function getUserOrExit($token)
      {
          $user = User::findByPasswordReset($token); /* debug($user); */

          if($user)
          {
              return $user;

          }else{

              View::renderTemplate('Password/token_expired.html');
              exit;
          }
      }
}