<?php

namespace App\Http\Controllers\Api;

use App\DataAccess\CountryRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryCreateRequestForm;
use Illuminate\Http\RedirectResponse;

class CountryController extends Controller
{
    public function __construct(
        private readonly CountryRepository $countryRepository
    ) {
    }

    public function create(CountryCreateRequestForm $request): RedirectResponse
    {
        $data = $request->body();

        $this->countryRepository->createCountry($data->title);

        return back();
    }

    public function delete(int $countryId): RedirectResponse
    {
        $this->countryRepository->deleteCountry($countryId);

        return back();
    }
}
