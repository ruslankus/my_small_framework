<?php

namespace App\Controllers;


use App\View;
use App\Models\News as ModelNews;

class News
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
    
    public function action($name)
    {
        $actionName = "action{$name}";
        $this->$actionName();
    }
    

    protected function actionIndex()
    {

        $this->view->title = "My site";
        $this->view->news = ModelNews::findAll();

        $this->view->display('App/templates/index.php');
    }
    
    
    protected function actionOne()
    {
        $id = (int)$_GET['id'];
        $this->view->article = ModelNews::findById($id);

        $this->view->display('App/templates/one.php');
    }
}