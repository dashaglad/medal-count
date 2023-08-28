<?php

namespace App\Http\Controllers\Web;

use App\ApiModels\Athlete\AthleteFullModel;
use App\ApiModels\Medal\MedalFullModel;
use App\DataAccess\AthleteRepository;
use App\DataAccess\CountryRepository;
use App\DataAccess\MedalRepository;
use App\DataAccess\SportRepository;
use App\Http\Controllers\Controller;
use App\Mappers\AthleteMapper;
use App\Mappers\CountryMapper;
use App\Mappers\MedalMapper;
use App\Models\Athlete;
use App\Models\Medal;
use Illuminate\View\View;

class MedalController extends Controller
{
    public function __construct(
        private readonly CountryRepository $countryRepository,
        private readonly CountryMapper $countryMapper,
        private readonly AthleteRepository $athleteRepository,
        private readonly AthleteMapper $athleteMapper,
        private readonly SportRepository $sportRepository,
        private readonly MedalRepository $medalRepository,
        private readonly MedalMapper $medalMapper
    ) {
    }

    public function create(): View
    {
        $sports = $this->sportRepository->getSports();
        $athletes = $this->athleteRepository->getAthletes();
        $medals = $this->medalRepository->getAllMedals();

        $athletesFullModels = $athletes->map(
            fn(Athlete $athlete): AthleteFullModel => $this->athleteMapper->mapFullAthlete($athlete)
        );


        $medalsFullModels = $medals->map(
            fn(Medal $medal): MedalFullModel => $this->medalMapper->mapFullMedal($medal)
        );

        return view(
            'medal.create',
            ['athletes' => $athletesFullModels, 'sports' => $sports, 'medals' => $medalsFullModels]
        );
    }

    public function countryMedals(int $countryId, string $medalType): View
    {
        $country = $this->countryRepository->getCountryById($countryId);
        $countryModel = $this->countryMapper->mapCountry($country);

        $medals = $this->medalRepository->getMedalsByCountryAndType($countryId, $medalType);

        $medalsFullModels = $medals->map(
            fn(Medal $medal): MedalFullModel => $this->medalMapper->mapFullMedal($medal)
        );

        return view(
            'medal.index',
            ['medals' => $medalsFullModels, 'medalType' => $medalType, 'country' => $countryModel]
        );
    }

    public function allCountryMedals(int $countryId): View
    {
        $country = $this->countryRepository->getCountryById($countryId);
        $countryModel = $this->countryMapper->mapCountry($country);

        $medals = $this->medalRepository->getMedalsByCountry($countryId);

        $medalsFullModels = $medals->map(
            fn(Medal $medal): MedalFullModel => $this->medalMapper->mapFullMedal($medal)
        );

        return view('medal.index', ['medals' => $medalsFullModels, 'country' => $countryModel]);
    }
}
