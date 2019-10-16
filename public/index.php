<?php

require '../debug.php';
require '../vendor/autoload.php';


/**
 * Front controller
 * PHP version 7.*
 */

/** Routing */
$router = new \Framework\Routing\Router();


/** Add Routes */
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);


/** Run Routing */
$url = \Framework\Http\Request::getPath();
$router->dispatch($url);
