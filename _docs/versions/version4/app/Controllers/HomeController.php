<?php
namespace App\Controllers;


use Framework\Routing\Controller;

/**
 * Home controller
 *
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    public function before()
    {
        echo "(before) <br>";
        // return false;
    }


    /**
     * After filter
     *
     * @return void
     */
    public function after()
    {
        echo "(after)";
    }


    /**
     * Show the index page
     * ex: http://localhost:8000/
     * @return void
     */
    public function indexAction()
    {
         echo 'Hello from ' . __METHOD__ . "<br>";
    }
}