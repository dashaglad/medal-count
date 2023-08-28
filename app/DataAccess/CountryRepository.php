<?php

declare(strict_types=1);

namespace App\DataAccess;

use App\Models\Athlete;
use App\Models\Country;
use App\Models\Medal;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CountryRepository
{
    public function getCountryById(int $countryId): Country
    {
        return Country::query()->where('id', '=', $countryId)->get()->first();
    }

    /**
     * @return Collection<int, Country>
     */
    public function getCountries(): Collection
    {
        return Country::query()->get();
    }

    public function getAthleteOwnerCountry(int $athleteId): Country
    {
        return Country::query()->where('id', '=', $athleteId)->get()->first();
    }

    public function getMedalOwnerCountry(int $medalId): Country
    {
        $athleteId = DB::table('athlete_medal')->where('medal_id', '=', $medalId)->pluck('athlete_id')->first();
        $countryId = Athlete::query()->where('id', '=', $athleteId)->pluck('country_id')->first();
        return Country::query()->where('id', '=', $countryId)->get()->first();
    }

    public function createCountry(string $title): Country
    {
        $country = new Country();

        $country->title = $title;
        $country->save();

        return $country;
    }

    public function deleteCountry(int $countryId): void
    {
        $athletesId = Athlete::query()->where('country_id', '=', $countryId)->pluck('id')->toArray();
        foreach ($athletesId as $athleteId) {
            $medalsIds = DB::table('athlete_medal')->where('athlete_id', '=', $athleteId)->pluck('medal_id')->toArray();
            DB::table('athlete_medal')->where('athlete_id', '=', $athleteId)->delete();

            foreach ($medalsIds as $medalId){
                Medal::query()->where('id','=',$medalId)->delete();
            }
        }
        Athlete::query()->where('country_id', '=', $countryId)->delete();

        Country::query()->where('id', '=', $countryId)->delete();
    }
}


