<?php
error_reporting(E_ALL);
require __DIR__ . "/autoload.php";

$url = trim($_SERVER['REQUEST_URI'], '/');

$url = stristr($url, '?', true);
$parsed = explode('/', $url);

$controllerName = !(empty($parsed[0])) ? ucfirst($parsed[0]) : 'News';
$fullName =  '\App\Controllers\\' . $controllerName;

$controller = new  $fullName;

$action = !empty($parsed[1]) ? ucfirst($parsed[1]): "Index";

try {

    $controller->action($action);

} catch (Exception $e){

    echo "Exception " . $e->getMessage();
}




