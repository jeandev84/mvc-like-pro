<?php
/**
 * Front controller
 * PHP version 7.*
 */

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
$router->add('{controller}/{action}');



/** Dispatching route */
$url = \Framework\Http\Request::getPath();
$router->dispatch($url);
