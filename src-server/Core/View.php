<?php

namespace Policeamunice\MVC\Core;

use Policeamunice\MVC\Resources\TemplatesLoader;

class View
{
    public function render($templateName, $data = null)
    {
        echo TemplatesLoader::load($templateName, $data);
    }
}
