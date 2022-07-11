<?php

namespace Policeamunice\MVC\Core;

use Policeamunice\MVC\Resources\ConfigsParser;

class Router
{
    private static array $routesConfig;

    public static function init(): void
    {
        self::$routesConfig = ConfigsParser::parse("routes.yaml");
    }

    public static function routeByRequestURI(string $requestURI): void
    {
        $routeName = 'main';
        $actionName = 'index';

        $routes = explode('/', $requestURI);

        if (!empty($routes[1])) {
            $routeName = $routes[1];
        }

        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        if (!empty($routes[3])) {
            throw new \Exception("Too much arguments in request '$requestURI'", 1);
        }

        if (key_exists($routeName, self::$routesConfig)) {
            $route = self::$routesConfig[$routeName];
        } else {
            throw new \Exception("Route '$routeName' not found in configutarion", 1);
        }

        try {
            $controller = new $route['controller'];
        } catch (\Throwable $th) {
            throw new \Exception("Controller '{$route['controller']}' does not exsist", 1);
        }

        if (!in_array($actionName, $route['actions'])) {
            throw new \Exception("Action '$actionName' not found in configutarion", 1);
        }

        if (method_exists($controller, $action = $actionName)) {
            $controller->$action();
        } else {
            throw new \Exception("Action '$actionName' does not exsist", 1);
        }
    }

    public static function routeTo404(): void
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/404';
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        header("Status: 404 Not Found");
        header('Location:' . $host);

        $route = self::$routesConfig['404'];
        $controller = new $route['controller'];
        $controller->index();
    }
}
