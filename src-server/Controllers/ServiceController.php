<?php

namespace Policeamunice\MVC\Controllers;

use Policeamunice\MVC\Core\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $this->view->render('service.html', []);
    }
}
