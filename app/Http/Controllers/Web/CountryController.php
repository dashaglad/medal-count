<?php

namespace App\Http\Controllers\Web;

use App\ApiModels\Country\CountryFullModel;
use App\DataAccess\CountryRepository;
use App\Http\Controllers\Controller;
use App\Mappers\CountryMapper;
use App\Models\Country;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function __construct(
        private readonly CountryRepository $countryRepository,
        private readonly CountryMapper $countryMapper
    )
    {
    }

    public function create(): View
    {
        $countries = $this->countryRepository->getCountries();

        $countriesFullModels = $countries->map(
            fn(Country $country): CountryFullModel => $this->countryMapper->mapFullCountry($country)
        );

        return view('country.create', ['countries' => $countriesFullModels]);
    }
}
