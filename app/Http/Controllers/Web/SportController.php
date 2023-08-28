<?php

namespace App\Http\Controllers\Web;

use App\ApiModels\SportModel;
use App\DataAccess\SportRepository;
use App\Http\Controllers\Controller;
use App\Mappers\SportMapper;
use App\Models\Sport;
use Illuminate\View\View;

class SportController extends Controller
{
    public function __construct(
        private readonly SportRepository $sportRepository,
        private readonly SportMapper $sportMapper
    ) {
    }

    public function create(): View
    {
        $sports = $this->sportRepository->getSports();

        $sportsModels = $sports->map(
            fn(Sport $sport): SportModel => $this->sportMapper->mapSport($sport)
        );

        return view('sport.create', ['sports' => $sportsModels]);
    }
}
