<?php
namespace App\Controllers;


use Framework\Security\Auth;
use Framework\Services\Flash;
use Framework\Templating\View;


/**
 * Class ProfileController
 * @package App\Controllers
 */
class ProfileController extends Authenticated
{

    /**
     * Before filter - called before each action method
     *
     * @return void
     * @throws \Exception
     */
     protected function before()
     {
         parent::before();
         $this->user = Auth::getUser();
     }


    /**
     * Show the profile
     *
     * Account may be active only if user's active account from email
     * @path /profile/show
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public function showAction()
     {
          View::renderTemplate('Profile/show.html', [
              'user' => $this->user
          ]);
     }

    /**
     * Show the from for editing the profile
     *
     * @path /profile/edit
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public function editAction()
     {
         View::renderTemplate('Profile/edit.html', [
             'user' => $this->user
         ]);
     }


    /**
     * Update the profile
     *
     * @return void
     * @throws \Exception
     */
     public function updateAction()
     {
         if($this->user->updateProfile($_POST))
         {
             Flash::addMessage('Changes saved');
             $this->redirect('/profile/show');
         }else{

             View::renderTemplate('Profile/edit.html', [
                 'user' => $this->user
             ]);
         }
     }
}