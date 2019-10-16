<?php
namespace App\Controllers;


use Framework\Routing\Controller;
use Framework\Templating\View;



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
        // echo "(before) <br>";
        // return false;
    }


    /**
     * After filter
     *
     * @return void
     */
    public function after()
    {
        // echo "(after)";
    }


    /**
     * Show the index page
     * ex: http://localhost:8000/
     * @return void
     */
    public function indexAction()
    {
         // echo 'Hello from ' . __METHOD__ . "<br>";
         View::render('Home/index.php', [
             'name' => 'Jean-Claude',
             'colours' => ['red', 'green', 'blue']
         ]);
    }

    /**
     * http://localhost:8000/home/show
     */
    public function showAction()
    {
        die(__METHOD__);
    }
}