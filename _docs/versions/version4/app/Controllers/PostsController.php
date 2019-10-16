<?php
namespace App\Controllers;


use Framework\Routing\Controller;

/**
 * Posts Controller
 *
 * Class PostsController
 * @package App\Controllers
 */
class PostsController extends Controller
{

    /**
     * Show the index page
     * ex: http://localhost:8000/posts/index
     * @return void
     */
     public function indexAction()
     {
         echo 'Hello from : '. __METHOD__ ;
         echo '<p>Query string parameters: <pre>'. htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
     }


     /**
      * Show the add new page
      * ex: http://localhost:8000/posts/add-new
      * @return void
      */
     public function addNewAction()
     {
         echo 'Hello from '. __METHOD__;
     }


    /**
     * Show the add new page
     * ex: http://localhost:8000/posts/123/edit
     * @return void
     */
     public function editAction()
     {
        echo 'Hello from '. __METHOD__;
        echo '<p>Route parameters: <pre>'.
            htmlspecialchars(print_r($this->route_params, true)).'</pre></p>';
     }
}