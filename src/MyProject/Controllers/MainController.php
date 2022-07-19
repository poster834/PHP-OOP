<?php

namespace MyProject\Controllers;

class MainController
{
    public function main()
    {
        include __DIR__. str_replace('/','\\','/../../templates/main/main.php');
        
    }

    public function sayHello(string $name)
    {
        echo 'Привет, '.$name; 
    }
}