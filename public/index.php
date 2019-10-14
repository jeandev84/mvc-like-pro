<?php

require '../debug.php';
require '../vendor/autoload.php';


/**
 * Front controller
 * PHP version 7.*
 */

// echo 'Requested URL = " ' . $_SERVER['QUERY_STRING'] . '"';

/**
 * Routing
 */

$router = new \Framework\Routing\Router();

// echo get_class($router);

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);


// Display the routing table
debug($router->getRoutes());


// Match the requested route
$fullUrl = $_SERVER['QUERY_STRING'] ?: $_SERVER['REQUEST_URI'];
$url = trim($fullUrl, '/');


if($router->match($url))
{
    debug($router->getParams());
}else{
    die("No rout found for URL '$url'");
}