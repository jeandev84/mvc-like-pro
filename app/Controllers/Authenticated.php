<?php
namespace App\Controllers;


use Framework\Routing\Controller;

/**
 * Pour tout controller qui aura besoin d'authentification,
 * n'as juste qu'a heriter de cette classe
 *
 * Class Authenticated
 * @package App\Controllers
 */
abstract class Authenticated extends Controller
{
    /**
     * This method will be executed before calling each action
     * Require the user to be authenticated before giving access to all methods in the controller
     *
     * @return void
     */
    protected function before()
    {
        $this->requireLogin();
    }
}