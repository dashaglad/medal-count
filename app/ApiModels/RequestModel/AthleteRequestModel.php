<?php

namespace App\ApiModels\RequestModel;

use Illuminate\Database\Eloquent\Model;

class AthleteRequestModel extends Model
{
    public string $name;

    public int $countryId;
}
