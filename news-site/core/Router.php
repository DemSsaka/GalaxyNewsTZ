<?php

require_once __DIR__ . '/../app/controllers/NewsController.php';

class Router {
    public static function handle() {
        $route = $_GET['route'] ?? 'news/index';
        $parts = explode('/', $route);

        $controllerName = ucfirst($parts[0]) . 'Controller';
        $action = $parts[1] ?? 'index';

        $controller = new $controllerName();

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo "Метод $action не найден в контроллере $controllerName";
        }
    }
}
