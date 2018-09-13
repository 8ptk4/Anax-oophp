<?php
/**
 * Autoloader for class.
 *
 * @param $class    Name of the class.
 */
spl_autoload_register(function ($class) {
    $path = "{$class}.php";
    if (is_file($path)) {
        include($path);
    }
});
