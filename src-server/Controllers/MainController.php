<?php

namespace Policeamunice\MVC\Controllers;

use Policeamunice\MVC\Core\Controller;

class MainController extends Controller
{
    public function index()
    {
        $this->view->render('main.html', []);
    }
}
