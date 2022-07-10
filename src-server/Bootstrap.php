<?php

use Policeamunice\MVC\Core\Router;
use Policeamunice\MVC\Resources\TemplatesLoader;

TemplatesLoader::init();

Router::init();
Router::routeByRequestURI($_SERVER['REQUEST_URI']);
