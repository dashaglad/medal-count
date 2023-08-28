<?php

namespace App\Http\Controllers\Api;

use App\DataAccess\MedalRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedalCreateRequestForm;
use Illuminate\Http\RedirectResponse;

class MedalController extends Controller
{
    public function __construct(
        private readonly MedalRepository $medalRepository
    ) {
    }

    public function create(MedalCreateRequestForm $request): RedirectResponse
    {
        $data = $request->body();

        $this->medalRepository->createMedal($data->type, $data->athleteId, $data->sportId);

        return back();
    }

    public function delete(int $medalId): RedirectResponse
    {
        $this->medalRepository->deleteMedal($medalId);

        return back();
    }
}
