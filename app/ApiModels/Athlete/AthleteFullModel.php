<?php

namespace App\ApiModels\Athlete;

use App\ApiModels\Country\CountryModel;

class AthleteFullModel extends AthleteModel
{
    public CountryModel $country;
}
