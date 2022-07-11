<?php

namespace Policeamunice\MVC\Controllers;

use Policeamunice\MVC\Core\Controller;

class NotFoundController extends Controller
{
    public function index()
    {
        $this->view->render('404.html', []);
    }
}
