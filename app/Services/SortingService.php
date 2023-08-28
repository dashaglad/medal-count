<?php

declare(strict_types=1);

namespace App\Services;

use App\ApiModels\Country\CountryFullModel;
use Illuminate\Support\Collection;


class SortingService
{
    /**
     * @param Collection<int, CountryFullModel> $countries
     * @return Collection<int, CountryFullModel>
     */
    public function sortCountriesByMedalCount(Collection $countries): Collection
    {
        return $countries->sortByDesc([
            fn ($elem1, $elem2) => count($elem2->goldMedals) <=> count($elem1->goldMedals),
            fn ($elem1, $elem2) => count($elem2->silverMedals) <=> count($elem1->silverMedals),
            fn ($elem1, $elem2) => count($elem2->bronzeMedals) <=> count($elem1->bronzeMedals),
            ['title']
        ])->values();
    }
}
