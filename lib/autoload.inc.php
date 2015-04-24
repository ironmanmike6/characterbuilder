<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 2/7/2015
 * Time: 3:55 PM
 */

/** @brief Autoload functionality
 * Classes are stored in the lib/cls directory with the extension .php
 */
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/cls/' . str_replace("\\", "/", $class_name) . '.php';
    if(is_file($file)) {
        include $file;
    } else {
        $file = __DIR__ . '/cls/stats/' . str_replace("\\", "/", $class_name) . '.php';
        if(is_file($file)) {
            include $file;
        }
    }
});

?>