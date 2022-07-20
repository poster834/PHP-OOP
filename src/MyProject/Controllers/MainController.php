<?php

namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;

class MainController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__. str_replace('/','\\','/../../templates/'));
        $this->db = new Db();
    }


    public function main()
    {
        $articles = $this->db->query('SELECT * FROM `articles`;');

        // $articles = [
        //     ['name' => 'Статья1', 'text' => 'Текст статьи 1'],
        //     ['name' => 'Статья2', 'text' => 'Текст статьи 2'],
        //     ['name' => 'Статья3', 'text' => 'Текст статьи 3'],
        // ];
        $this->view->renderHtml('main/main.php',['articles'=>$articles]);

    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php',['name'=>$name]);
    }
}