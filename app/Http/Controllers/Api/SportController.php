<?php

namespace App\Http\Controllers\Api;

use App\DataAccess\SportRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\SportCreateRequestForm;
use Illuminate\Http\RedirectResponse;

class SportController extends Controller
{
    public function __construct(
        private readonly SportRepository $sportRepository
    )
    {
    }

    public function create(SportCreateRequestForm $request): RedirectResponse
    {
        $data = $request->body();

        $this->sportRepository->createSport($data->title);

        return back();
    }

    public function delete(int $sportId): RedirectResponse
    {
        $this->sportRepository->deleteSport($sportId);

        return back();
    }
}
