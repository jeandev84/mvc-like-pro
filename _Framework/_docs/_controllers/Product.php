<?php


class Product
{

    /*
     * @param $method [ ex: $method = 'publish' ]
     * @param $args   [ ex: $args = [123, "a"] ]
     *
     public function __call($method, $args)
     {
        // run code before
        call_user_func_array([$this, $method], $args);
        // run code after
     }
    */

     public function __call($name, $args)
     {
        // run code before
        call_user_func_array([$this, sprintf('%sAction', $name)], $args);
        // run code after
     }

     public function indexAction()
     {

     }
}

$product = new Product();
$product->indexAction();