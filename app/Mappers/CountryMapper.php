<?php

declare(strict_types=1);

namespace App\Mappers;

use App\ApiModels\Country\CountryFullModel;
use App\ApiModels\Country\CountryModel;
use App\ApiModels\Medal\MedalModel;
use App\DataAccess\MedalRepository;
use App\Models\Country;
use App\Models\Medal;

class CountryMapper
{
    public function mapCountry(Country $country): CountryModel
    {
        $model = new CountryModel();
        $model->id = $country->id;
        $model->title = $country->title;

        return $model;
    }

    public function mapFullCountry(Country $country): CountryFullModel
    {
        $medalRepository = new MedalRepository();

        $medalMapper = new MedalMapper();

        $model = new CountryFullModel();
        $model->id = $country->id;
        $model->title = $country->title;

        $goldMedals = $medalRepository->getMedalsByCountryAndType($country->id, 'gold');
        $silverMedals = $medalRepository->getMedalsByCountryAndType($country->id, 'silver');
        $bronzeMedals = $medalRepository->getMedalsByCountryAndType($country->id, 'bronze');

        $model->goldMedals = $goldMedals->map(fn(Medal $medal): MedalModel => $medalMapper->mapMedal($medal))->toArray();
        $model->silverMedals = $silverMedals->map(fn(Medal $medal): MedalModel => $medalMapper->mapMedal($medal))->toArray();
        $model->bronzeMedals = $bronzeMedals->map(fn(Medal $medal): MedalModel => $medalMapper->mapMedal($medal))->toArray();

        return $model;
    }
}
