<?php

require __DIR__ . "/autoload.php";

use App\Models\User;

$users = User::findAll();

$view = new \App\View();

$view->users = $users;
echo $view->render(__DIR__ ."/App/templates/index.php");



