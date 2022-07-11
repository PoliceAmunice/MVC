<?php

use Policeamunice\MVC\Core\Router;
use Policeamunice\MVC\Resources\TemplatesLoader;

TemplatesLoader::init();

Router::init();

try {
    Router::routeByRequestURI($_SERVER['REQUEST_URI']);
} catch (\Throwable $th) {
    // throw new Exception($th->getMessage(), 1);
    Router::routeTo404();
}
