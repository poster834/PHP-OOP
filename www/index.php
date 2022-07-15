<?php

function myAutoLoader(string $className) 
{
    require_once __DIR__.'/../src/'. str_replace('/', '\\',$className).'.php';
}
spl_autoload_register('myAutoLoader');

echo $route = $_GET['route'] ?? '';


$pattern = '~^hello/(.*)$~';

preg_match($pattern, $route, $matches);
echo "<pre>";
var_dump($matches);

// $controller = new \MyProject\Controllers\MainController();


// if (!empty($_GET['name'])) 
// {
//     $controller->sayHello($_GET['name']);
// } else {
//     $controller->main();
// }







//HomeWork

// $url = '/post/892';
// $pattern = '/(?P<controller>[a-zA-Z]+)\/(?P<id>[0-9]+)/m';


// preg_match($pattern, $url, $matches);
// echo "<pre>";
// $controller = $matches['controller'];
// $id = $matches['id'];

// var_dump($controller);
// var_dump($id);




