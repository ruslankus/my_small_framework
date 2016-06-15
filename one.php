<?php

require __DIR__ . "/autoload.php";


//$view->display('App/templates/index.php');

$controller = new \App\Controllers\News();
$controller->action('One');
