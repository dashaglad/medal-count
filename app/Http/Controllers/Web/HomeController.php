<?php

namespace App\Http\Controllers\Web;

use App\ApiModels\Country\CountryFullModel;
use App\DataAccess\CountryRepository;
use App\DataAccess\MedalRepository;
use App\Http\Controllers\Controller;
use App\Mappers\CountryMapper;
use App\Mappers\MedalMapper;
use App\Models\Country;
use App\Services\SortingService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly CountryRepository $countryRepository,
        private readonly CountryMapper $countryMapper,
        private readonly SortingService $sortingService
    ) {
    }

    public function index(): View
    {
        $countries = $this->countryRepository->getCountries();

        $countriesFullModels = $countries->map(
            fn(Country $country): CountryFullModel => $this->countryMapper->mapFullCountry($country)
        );

        $sortedCountriesFullModels = $this->sortingService->sortCountriesByMedalCount($countriesFullModels);

        return view('home', ['countries' => $sortedCountriesFullModels]);
    }
}
