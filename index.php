<?php
error_reporting(E_ALL);
require __DIR__ . "/autoload.php";

$url = trim($_SERVER['REQUEST_URI'], '/');

if(strpos($url,'?')) {
    $url = stristr($url, '?');
}
$parsed = explode('/', $url);

$controllerName = !(empty($parsed[0])) ? ucfirst($parsed[0]) : 'News';
$fullName =  '\App\Controllers\\' . $controllerName;

$controller = new  $fullName;

$action = !empty($parsed[1]) ? ucfirst($parsed[1]): "Index";

try {

    $controller->action($action);

} catch (\App\Exceptions\Core $e){

    echo "Exception Core was thrown " . $e->getMessage();

}catch (\App\Exceptions\Db $e) {
    echo "Data base problem, error code - " . $e->getCode()
        . ", error message - " . $e->getMessage();
}




