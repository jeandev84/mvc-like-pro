<?php
namespace App\Controllers;


use Framework\Routing\Controller;
use Framework\Security\Auth;
use Framework\Templating\View;


/**
 * Controller where we can put all thing we want
 *
 * Class ItemsController
 */
class ItemsController extends Authenticated
{


    /**
     * Items index
     *
     * @path /items/index
     *
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
      public function indexAction()
      {
           View::renderTemplate('Items/index.html');
      }


      /**
       * Add a new item
       *
       * @return void
      */
      public function newAction()
      {
          echo "new action";
      }


      /**
       * Show an item
       *
       * @return void
       */
       public function showAction()
       {
            echo "show action";
       }
}