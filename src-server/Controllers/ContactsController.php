<?php

namespace Policeamunice\MVC\Controllers;

use Policeamunice\MVC\Core\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        $this->view->render('contacts.html', []);
    }

    public function feedback()
    {
    }
}
