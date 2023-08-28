<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\ApiModels\Athlete\AthleteFullModel;
use App\ApiModels\Country\CountryModel;
use App\DataAccess\AthleteRepository;
use App\DataAccess\CountryRepository;
use App\Http\Controllers\Controller;
use App\Mappers\AthleteMapper;
use App\Mappers\CountryMapper;
use App\Models\Athlete;
use App\Models\Country;
use Illuminate\View\View;

class AthleteController extends Controller
{
    public function __construct(
        private readonly AthleteRepository $athleteRepository,
        private readonly AthleteMapper $athleteMapper,
        private readonly CountryRepository $countryRepository,
        private readonly CountryMapper $countryMapper
    ) {
    }

    public function create(): View
    {
        $countries = $this->countryRepository->getCountries();
        $athletes = $this->athleteRepository->getAthletes();

        $athletesFullModels = $athletes->map(
            fn(Athlete $athlete): AthleteFullModel => $this->athleteMapper->mapFullAthlete($athlete)
        );

        $countriesModels = $countries->map(
            fn(Country $country): CountryModel => $this->countryMapper->mapCountry($country)
        );

        return view('athlete.create', ['athletes' => $athletesFullModels, 'countries' => $countriesModels]);
    }
}
