<?php

namespace Policeamunice\MVC\Controllers;

use Policeamunice\MVC\Core\Controller;

class PortfolioController extends Controller
{
    public function index()
    {
        $this->view->render('portfolio.html', []);
    }
}
