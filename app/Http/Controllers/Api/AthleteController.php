<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\DataAccess\AthleteRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\AthleteCreateRequestForm;
use Illuminate\Http\RedirectResponse;

class AthleteController extends Controller
{
    public function __construct(
        private readonly AthleteRepository $athleteRepository
    ) {
    }

    public function create(AthleteCreateRequestForm $request): RedirectResponse
    {
        $data = $request->body();

        $this->athleteRepository->createAthlete($data->name, $data->countryId);

        return back();
    }

    public function delete(int $athleteId): RedirectResponse
    {
        $this->athleteRepository->deleteAthlete($athleteId);

        return back();
    }
}
