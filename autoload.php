<?php

function my_app_autoload($class){

    $file_name = __DIR__ . '/' .str_replace('\\','/', $class) . ".php";

    if(file_exists($file_name)){

        require  $file_name;
    }


}


spl_autoload_register('my_app_autoload');

spl_autoload_register(function($class){

    $file_name = __DIR__ . '/' .str_replace(['\\', 'App'],['/','lib'], $class) . ".php";

    if(file_exists($file_name)){

        require  $file_name;
    }

});

include __DIR__ . "/vendor/autoload.php";