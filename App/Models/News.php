<?php

namespace App\Models;


use App\Model;

class News extends Model
{
    const TABLE = "news";


    /**
     * Lazy load
     *
     * @param $k
     * @return mixed|null
     *
     */
    public function __get($k)
    {
        switch ($k){

            case 'author':

                $authorModel = new Author();
                return $authorModel->findById($this->author_id);

                break;

            default:

                return null;
        }

    }


    public function __isset($name)
    {
        switch ($name){

            case 'author':

                return true;

                break;

            default:

                return false;
        }
    }

}