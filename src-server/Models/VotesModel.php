<?php

namespace Policeamunice\MVC\Models;

use Policeamunice\MVC\Core\Model;

class VotesModel extends Model
{
    public function getData(): array
    {
        $jsonString = file_get_contents('./portfolio_mock.json');
        return json_decode($jsonString, true);
    }
}
