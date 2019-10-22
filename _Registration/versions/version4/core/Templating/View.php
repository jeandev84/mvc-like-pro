<?php
namespace Framework\Templating;


use Framework\Security\Auth;
use mysql_xdevapi\Exception;

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
             throw new Exception(
                 sprintf('%s not found', $file)
             );
         }
     }

    /**
     * Render a view template using Twig
     *
     * @param string $template The template file
     * @param array $args Associative array of data to display in the view (optional)
     *
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
     public static function renderTemplate($template, $args = [])
     {
         static $twig = null;

         if($twig === null)
         {
             $loader = new \Twig_Loader_Filesystem(ROOT . '/app/Views');
             $twig = new \Twig_Environment($loader);

             # add global variables to the view twig
             # $twig->addGlobal('session', $_SESSION);
             $twig->addGlobal('is_logged_in', Auth::isLoggedIn());
             $twig->addGlobal('current_user', Auth::getUser());

         }

         echo $twig->render($template, $args);
     }

}