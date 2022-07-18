<?php

function myAutoLoader(string $className) 
{
    require_once __DIR__.'/../src/'. str_replace('/', '\\',$className).'.php';
}
spl_autoload_register('myAutoLoader');

$route = $_GET['route'] ?? '';


$routes = require __DIR__ .  str_replace('/', '\\','/../src/routes.php');

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    echo 'Страница не найдена';
    return;
}

unset($matches[0]);
// echo "<pre>";
// var_dump($controllerAndAction);
// var_dump($matches);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];
$controller = new $controllerName();
$controller -> $actionName(...$matches);

