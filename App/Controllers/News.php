<?php

namespace App\Controllers;


use App\Controller;
use App\Exceptions\Core;
use App\MultiException;
use App\View;
use App\Models\News as ModelNews;

class News extends Controller
{


    protected function actionIndex()
    {

        $this->view->title = "My site";
        $this->view->news = ModelNews::findAll();

        $this->view->display(__DIR__ .'/../templates/index.php');
    }
    
    
    protected function actionOne()
    {   
        
        
        $id = (int)$_GET['id'];
        $this->view->article = ModelNews::findById($id);

        $this->view->display(__DIR__ . '/../templates/one.php');
    }


    protected  function actionCreate()
    {
        try {
            $article = new ModelNews();
            $article->fill([]);
            $article->save();
        }catch (MultiException $e){
            $this->view->errors = $e;
        }

        $this->view->display(__DIR__ . '/../templates/create.php');
    }


}