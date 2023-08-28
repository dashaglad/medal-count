<?php

namespace App\ApiModels\Medal;

use App\ApiModels\Athlete\AthleteModel;
use App\ApiModels\Country\CountryModel;
use App\ApiModels\SportModel;

class MedalFullModel extends MedalModel
{
    public AthleteModel $athlete;

    public SportModel $sport;

    public CountryModel $country;
}
