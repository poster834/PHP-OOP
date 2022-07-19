<?php
function myAutoLoader(string $className) {
    require_once __DIR__ . str_replace('/','\\','/../src/'.$className.'.php');
}
spl_autoload_register('myAutoLoader');

$routes = require __DIR__ . str_replace('/','\\','/../src/routes.php');
echo "<pre>";
// var_dump($routes);
// $author = new \MyProject\Models\Users\User('Иван');
// $article = new \MyProject\Models\Articles\Article('Название', 'Текст статьи', $author);

// $controller = new \MyProject\Controllers\MainController();

// if (!empty($_GET['name'])) {
//     $controller->sayHello($_GET['name']);    
// } else {
//     $controller->main();
// }
$route = $_GET['route'] ?? '';
    
$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {
    
    preg_match($pattern, $route, $matches);  
    
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }  
}

if (!$isRouteFound) {
    echo "Page not found";
    return;
}

unset($matches[0]);
$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller -> $actionName(...$matches);


