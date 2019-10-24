<?php
/**
 * Front controller
 * PHP version 7.*
 */

/** Give cookie lifetime , it's give us to login user after closing browser **/
ini_set('session.cookie_lifetime', '864000'); // ten days in seconds

/**
 * Define some constantes
 */
define('ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);


/**
 * Autoloading
 */
require '../debug.php';
require '../vendor/autoload.php';


/**
 * Error and Exception
 */
error_reporting(E_ALL);
set_error_handler('Framework\ErrorHandler\Error::errorHandler');
set_exception_handler('Framework\ErrorHandler\Error::exceptionHandler');


/**
 * Sessions
 * start the session after error handler
 */
session_start();


/**
 * Twig
 */
/*
 * Manually install Twig
require_once ROOT.'/vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
*/



/** Routing */
$router = new \Framework\Routing\Router();


/** Add Routes */
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'new']);
$router->add('logout', ['controller' => 'Login', 'action' => 'destroy']);
$router->add('password/reset/{token:[\da-f]+}', ['controller' => 'Password', 'action' => 'reset']);
$router->add('{controller}/{action}'); // default /controller/action



/** Dispatching route */
$url = \Framework\Http\Request::getPath();
$router->dispatch($url);
