<?php

namespace App;


abstract class Model
{

    const TABLE = "";

    public $id;


    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            "SELECT * FROM " . static::TABLE, static::class
        );
    }



    public function isNew()
    {
        return empty($this->id);
    }


    public function insert()
    {
        $columns = [];
        $values = [];

        if($this->isNew())
        {
            return;
        }
        
        foreach ($this as $k => $v)
        {
            if("id" == $k){
                continue;
            }
            $columns[] = $k;
            $values[":{$k}"] = $v;

            $sql = "INSERT INTO ". static::TABLE  . " (". implode(', ' , $columns) .") "
                ."VALUES(". implode(', ', array_keys($values)) .")";
        }

        $res = Db::instance()->execute($sql, $values);

        return $res;

    }
}