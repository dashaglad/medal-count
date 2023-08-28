<?php

namespace App\ApiModels\RequestModel;

use Illuminate\Database\Eloquent\Model;

class MedalRequestModel extends Model
{
    public string $type;

    public int $sportId;

    public int $athleteId;
}
