<?php
function myAutoLoader(string $className) {
    require_once __DIR__ . str_replace('/','\\','/../src/'.$className.'.php');
}
spl_autoload_register('myAutoLoader');

$routes = require __DIR__ . str_replace('/','\\','/../src/routes.php');
echo "<pre>";

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

