<?php
$GLOBALS['AVATAR_SRC'] = '/../../../www/img/';

function myAutoLoader(string $className) {
    require_once __DIR__ . str_replace('/','\\','/../src/'.$className.'.php');
}

try{
    spl_autoload_register('myAutoLoader');

    $routes = require __DIR__ . str_replace('/','\\','/../src/routes.php');
    

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
        throw new \MyProject\Exceptions\NotFoundException();
    }

    unset($matches[0]);
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller -> $actionName(...$matches);
} catch (\MyProject\Exceptions\DbException $e) {
    $view = new \MyProject\View\View(__DIR__. str_replace('/','\\','/../src/templates/errors'));
    $view->renderHtml('500.php', ['error'=>$e->getMessage()],500);
} catch (\MyProject\Exceptions\NotFoundException $e) {
    $view = new \MyProject\View\View(__DIR__. str_replace('/','\\','/../src/templates/errors'));
    $view->renderHtml('404.php', ['error'=>$e->getMessage()],404);
}catch (\MyProject\Exceptions\UnauthorizedException $e) {
    $view = new \MyProject\View\View(__DIR__. str_replace('/','\\','/../src/templates/errors'));
    $view->renderHtml('401.php', ['error'=>$e->getMessage()],401);
}catch (\MyProject\Exceptions\ForbiddenException $e) {
    $view = new \MyProject\View\View(__DIR__. str_replace('/','\\','/../src/templates/errors'));
    $view->renderHtml('notAllow.php', ['error'=>$e->getMessage()],401);
}


