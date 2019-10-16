<?php
namespace App\Controllers\Admin;


use Framework\Routing\Controller;

/**
 * Class UsersController
 * @package App\Controllers\Admin
 */
class UsersController extends Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
         // Make sure an admin user is logged in for exemple
         // return false
    }

    /**
     * Show the index page
     * @http://localhost:8000/admin/users/index
     * @return void
     */
    public function indexAction()
    {
         echo 'User admin index';
    }
}