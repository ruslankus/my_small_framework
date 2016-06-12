<?php

require __DIR__ . "/autoload.php";

use App\Model;
use App\Models\User;

$user = new User();

$user->name = "Vasia";
$user->email = "test@email.com";
$user->id = 8;

$user->insert();




