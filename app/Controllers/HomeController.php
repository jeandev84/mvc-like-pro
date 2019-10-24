<?php
namespace App\Controllers;


use App\Services\Mail;
use Framework\Routing\Controller;
use Framework\Security\Auth;
use Framework\Sessions\Session;
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
     * Show the index page
     * ex: http://localhost:8000/
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function indexAction()
    {
        /*
        View::renderTemplate('Home/index.html', [
            'user' => Auth::getUser(), // current logged in user
        ]);
        */

        // Send mail
        # Mail::send('demo@gmail.com', 'Test', 'This is a test', '<h1>This is a test</h1>');

        // show view
        View::renderTemplate('Home/index.html');
    }

}