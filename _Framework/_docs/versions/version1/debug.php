<?php

/**
 * @param $var
 * @param bool $die
 */
function debug($var, $die = false)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    if($die) die;
}


/**
 * @param $var
 * @param bool $die
 */
function dd($var, $die = false)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if($die) die;
}