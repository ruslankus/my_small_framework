<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 24/06/16
 * Time: 10:02
 */

namespace App\Controllers;


use App\Controller;

class Test extends Controller
{


    protected function actionIndex()
    {

        $f = $this->getFilter('username');

        echo $f("rere rerer rerer rerer rere yuytu");

    }


    protected function actionGen()
    {
        foreach ($this->generate() as $n){
            echo $n;
        }
    }


    protected function actionTest()
    {
        echo $this->sum(1,2,3,4);
    }



    private function getFilter($type){


        switch ($type){

            case "email":
                return function ($x){
                    return trim($x);
                };

                break;

            case 'username':
                return function ($x){
                    return str_replace(' ','',$x);
                };

                break;
        }

    }


    private function generate(){
        for($i = 1; $i < 15; $i++){
            yield $i;
        }
    }


    private function sum(...$num)
    {
        return array_sum($num);
    }






}