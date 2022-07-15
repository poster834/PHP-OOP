<?php
namespace MyProject\Controllers;

class MainController
{
    public function main()
    {
        echo "Главная страница";

    }

    public function sayHello(string $name)
    {
        echo "Привет, ".$name."!<br><a href='/www/index.php'>Main</a>";
    }
}