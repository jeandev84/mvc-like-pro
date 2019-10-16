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
     * @param array $data [ or $args ]
     */
     public static function render($view, $data = [])
     {
         extract($data, EXTR_SKIP);

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

}