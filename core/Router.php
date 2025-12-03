<?php
class Router {
    private $routes = [];

    public function add($method, $path, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestUri = str_replace('/index.php', '', $requestUri);
        
        if ($requestUri === '') {
            $requestUri = '/';
        }

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod) {
                // Check if path matches or contains query parameters
                $pathPattern = str_replace('/', '\/', $route['path']);
                if ($route['path'] === $requestUri || 
                    ($route['path'] !== '/' && strpos($requestUri, $route['path']) === 0)) {
                    
                    $controllerName = $route['controller'];
                    $actionName = $route['action'];
                    
                    require_once "controllers/$controllerName.php";
                    $controller = new $controllerName();
                    $controller->$actionName();
                    return;
                }
            }
        }

        http_response_code(404);
        echo "404 - Page Not Found";
    }
}