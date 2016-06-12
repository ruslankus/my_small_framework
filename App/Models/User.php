<?php

namespace App\Models;


use App\Model;

class User extends Model
{
    const TABLE = 'user';

    public $email;
    public $name;

}