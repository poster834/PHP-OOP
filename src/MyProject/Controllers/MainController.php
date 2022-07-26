<?php

namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;
use MyProject\Models\Articles\Article;

class MainController
{
    /** @var View */
    private $view;
    
    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__. str_replace('/','\\','/../../templates/'));
        $this->db =Db::getInstances();
    }


    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php',['articles'=>$articles]);
    }

    // public function sayHello(string $name)
    // {
    //     $this->view->renderHtml('main/hello.php',['name'=>$name]);
    // }
}