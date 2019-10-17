<?php
namespace Framework\Templating;


/**
 * Class View
 * @package Framework\Templating
 */
class View
{
    /**
     * @param $view
     * @param array $args
     */
     public static function render($view, $args = [])
     {
         extract($args, EXTR_SKIP);

         /* $file = sprintf(ROOT .'/templates/views/%s', $view); */
         $file = sprintf(ROOT .'/app/Views/%s', $view);

         if(is_readable($file))
         {
             // relative to Core directory
             require $file;

         }else{
             echo sprintf('%s not found', $file);
         }
     }

     /**
      * Render a view template using Twig
      *
      * @param string $template The template file
      * @param array $args   Associative array of data to display in the view (optional)
      *
      * @return void
     */
     public static function renderTemplate($template, $args = [])
     {
         static $twig = null;

         if($twig === null)
         {
             $loader = new \Twig_Loader_Filesystem(ROOT . '/app/Views');
             $twig = new \Twig_Environment($loader);
         }

         echo $twig->render($template, $args);
     }

}