<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 11/06/16
 * Time: 14:18
 */

namespace App;


abstract class Model
{

    const TABLE = "";


    public static function findAll()
    {
        $db = new Db();
        return $db->query(
            "SELECT * FROM " . static::TABLE, static::class
        );
    }
}