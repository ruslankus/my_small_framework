<?php

namespace App;


abstract class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($name)
    {

        $this->beforeAction();
        $actionName = "action{$name}";
        $this->$actionName();
    }


    protected function beforeAction(){}


}