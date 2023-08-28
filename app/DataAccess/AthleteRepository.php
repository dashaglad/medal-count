<?php

declare(strict_types=1);

namespace App\DataAccess;

use App\Models\Athlete;
use App\Models\Medal;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AthleteRepository
{
    /**
     * @return Collection<int, Athlete>
     */
    public function getAthletes(): Collection
    {
        return Athlete::query()->get();
    }

    public function getMedalOwnerAthlete(int $medalId): Athlete
    {
        $athleteId = DB::table('athlete_medal')->where('medal_id', '=', $medalId)->pluck('athlete_id')->first();
        return Athlete::query()->where('id', '=', $athleteId)->get()->first();
    }

    /**
     * @param int $countryId
     * @return Collection<int, Athlete>
     */
    public function getAthletesByCountry(int $countryId): Collection
    {
        return Athlete::query()->where('country_id', '=', $countryId)->get();
    }

    /**
     * @return Athlete<int, Athlete>
     */
    public function createAthlete(string $name, int $countryId): Athlete
    {
        $athlete = new Athlete();
        $athlete->name = $name;
        $athlete->country_id = $countryId;
        $athlete->save();

        return $athlete;
    }

    public function deleteAthlete(int $athleteId): void
    {
        $medalsIds = DB::table('athlete_medal')->where('athlete_id', '=', $athleteId)
            ->pluck('medal_id')->toArray();
        foreach ($medalsIds as $medalId){
            Medal::query()->where('id', '=', $medalId)->delete();
        }
        Athlete::query()->where('id', '=', $athleteId)->delete();
    }
}
