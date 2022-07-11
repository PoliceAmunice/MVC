<?php

namespace Policeamunice\MVC\Controllers;

use Policeamunice\MVC\Core\Controller;

class MainController extends Controller
{
    public function index()
    {
        $readme = file_get_contents('./README.md');
        $Parsedown = new \Parsedown();
        $parsedReadme = $Parsedown->text($readme);
        $this->view->render('main.html', [
            'readme' => $parsedReadme,
        ]);
    }
}
