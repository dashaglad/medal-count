<?php

declare(strict_types=1);

namespace App\Mappers;

use App\ApiModels\SportModel;
use App\Models\Sport;

class SportMapper
{
    public function mapSport(Sport $sport): SportModel
    {
        $model = new SportModel();

        $model->id = $sport->id;
        $model->title = $sport->title;

        return $model;
    }
}
