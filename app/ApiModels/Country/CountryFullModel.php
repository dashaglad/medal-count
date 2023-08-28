<?php

declare(strict_types=1);

namespace App\ApiModels\Country;

use App\ApiModels\Medal\MedalModel;

class CountryFullModel extends CountryModel
{
//    /**
//     * @var AthleteModel[]
//     */
//    public array $athletes;

    /**
     * @var MedalModel[]
     */
    public array $goldMedals;

    /**
     * @var MedalModel[]
     */
    public array $silverMedals;

    /**
     * @var MedalModel[]
     */
    public array $bronzeMedals;
}
