<?php
namespace App\Controllers;


use Framework\Routing\Controller;

/**
 * Class AccountController
 * @package App\Controllers
 */
class AccountController extends Controller
{

     /**
      * Validate if email is available (AJAX) for a new signup.
      *
      * @route: /account/validate-email
      * @return void
      */
     public function validateEmailAction()
     {
         $is_valid = ! User::emailExists($_GET['email']);

         header('Content-Type: application/json');
         echo json_encode($is_valid);
     }
}