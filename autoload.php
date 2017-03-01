<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 18/02/17
 * Time: 15:09
 */

spl_autoload_register(function($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $dir = __DIR__ . DIRECTORY_SEPARATOR . 'src';
    $file = $dir . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
