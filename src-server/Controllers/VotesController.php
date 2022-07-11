<?php

namespace Policeamunice\MVC\Controllers;

use Policeamunice\MVC\Core\Controller;
use Policeamunice\MVC\Models\VotesModel;

class VotesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new VotesModel();
    }

    public function index()
    {
        $data = $this->model->getData();

        $this->view->render('votes.html', [
            'votes' => $data,
        ]);
    }
}
