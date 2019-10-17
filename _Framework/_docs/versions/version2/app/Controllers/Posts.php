<?php
namespace App\Controllers;


/**
 * Post Controller
 *
 * Class Posts
 * @package App\Controllers
 */
class Posts
{

    /**
     * Show the index page
     * ex: http://localhost:8000/posts/index
     * @return void
     */
     public function index()
     {
         echo 'Hello from : '. __METHOD__;
     }


     /**
      * Show the add new page
      * ex: http://localhost:8000/posts/add-new
      * @return void
      */
     public function addNew()
     {
         echo 'Hello from '. __METHOD__;
     }
}