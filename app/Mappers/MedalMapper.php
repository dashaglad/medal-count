<?php

declare(strict_types=1);

namespace App\Mappers;

use App\ApiModels\Medal\MedalFullModel;
use App\ApiModels\Medal\MedalModel;
use App\DataAccess\AthleteRepository;
use App\DataAccess\CountryRepository;
use App\DataAccess\SportRepository;
use App\Models\Medal;

class MedalMapper
{
    public function mapMedal(Medal $medal): MedalModel
    {
        $model = new MedalModel();
        $model->id = $medal->id;
        $model->type = $medal->type;

        return $model;
    }

    public function mapFullMedal(Medal $medal): MedalFullModel
    {
        $athleteRepository = new AthleteRepository();
        $sportRepository = new SportRepository();
        $countryRepository = new CountryRepository();

        $sportMapper = new SportMapper();
        $athleteMapper = new AthleteMapper();
        $countryMapper = new CountryMapper();

        $model = new MedalFullModel();
        $model->id = $medal->id;
        $model->type = $medal->type;
        $model->sport = $sportMapper->mapSport($sportRepository->getSportOfMedal($medal->id));
        $model->country = $countryMapper->mapCountry($countryRepository->getMedalOwnerCountry($medal->id));

        $model->athlete = $athleteMapper->mapAthlete($athleteRepository->getMedalOwnerAthlete($medal->id));

        return $model;
    }
}
