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
     * Show the index page
     * ex: http://localhost:8000/
     * @return void
     */
    public function index()
    {
         echo 'Hello from ' . __METHOD__;
    }
}