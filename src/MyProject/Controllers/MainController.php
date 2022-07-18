<?php
namespace MyProject\Controllers;
use MyProject\View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . str_replace('/', '\\','/../../../templates'));
    }

    public function main()
    {
        $articles = [
            ['name'=>'Статья1', 'text'=>'Текст статьи 1'],
            ['name'=>'Статья2', 'text'=>'Текст статьи 2'],
        ];
        $this->view->renderHtml('main/main.php', ['articles'=>$articles]);
    }

    public function sayHello(string $name)
    {
        echo "Привет, ".$name."!<br><a href='/www/index.php'>Main</a>";
    }
}