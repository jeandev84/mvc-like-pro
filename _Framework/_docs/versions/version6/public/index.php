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
 * Twig
 */
/*
require_once ROOT.'/vendor/Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
*/



/** Routing */
$router = new \Framework\Routing\Router();


/** Add Routes */
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);


/** Dispatching route */
$url = \Framework\Http\Request::getPath();
$router->dispatch($url);
