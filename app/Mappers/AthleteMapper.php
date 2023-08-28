<?php

declare(strict_types=1);

namespace App\Mappers;

use App\ApiModels\Athlete\AthleteFullModel;
use App\ApiModels\Athlete\AthleteModel;
use App\DataAccess\CountryRepository;
use App\Models\Athlete;

class AthleteMapper
{
    public function mapAthlete(Athlete $athlete): AthleteModel
    {
        $model = new AthleteModel();
        $model->id = $athlete->id;
        $model->name = $athlete->name;

        return $model;
    }

    public function mapFullAthlete(Athlete $athlete): AthleteFullModel
    {
        $countryRepository = new CountryRepository();
        $countryMapper = new CountryMapper();

        $model = new AthleteFullModel();
        $model->id = $athlete->id;
        $model->name = $athlete->name;
        $model->country = $countryMapper->mapCountry($countryRepository->getAthleteOwnerCountry($athlete->country_id));

        return $model;
    }
}
