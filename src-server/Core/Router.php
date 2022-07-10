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
        $routes = explode('/', $requestURI);

        if (empty($routes[1])) {
            $route = self::$routesConfig['main'];
            $controller = new $route['controller'];
            $controller->index();
            return;
        }

        if (!key_exists($routes[1], self::$routesConfig)) {
            echo "404";
            return;
        }

        $route = self::$routesConfig[$routes[1]];

        if (empty($action = $routes[2])) {
            $controller = new $route['controller'];
        } elseif (key_exists('actions', $route)
            && in_array($action, $route['actions'])
        ) {
            $controller = new $route['controller'];
            $controller->$action();
        } else {
            echo "404";
            return;
        }
    }

    private function errorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
