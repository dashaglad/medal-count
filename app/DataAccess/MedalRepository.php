<?php

declare(strict_types=1);

namespace App\DataAccess;

use App\Models\Medal;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MedalRepository
{
    /**
     * @param int $countryId
     * @return Collection<int, Medal>
     */

    public function getAllMedals(): Collection
    {
        return Medal::query()->get();
    }
    public function getMedalsByCountryAndType(int $countryId, string $type): Collection
    {
        return Medal::query()
            ->join('athlete_medal', 'athlete_medal.medal_id', '=', 'medals.id')
            ->join('sports', 'medals.sport_id', '=', 'sports.id')
            ->join('athletes', 'athlete_medal.athlete_id', '=', 'athletes.id')
            ->select('medals.*')
            ->where('medals.type', '=', $type)
            ->where('athletes.country_id', '=', $countryId)
            ->get();
    }

    public function getMedalsByCountry(int $countryId): Collection
    {
        return Medal::query()
            ->join('athlete_medal', 'athlete_medal.medal_id', '=', 'medals.id')
            ->join('sports', 'medals.sport_id', '=', 'sports.id')
            ->join('athletes', 'athlete_medal.athlete_id', '=', 'athletes.id')
            ->select('medals.*')
            ->where('athletes.country_id', '=', $countryId)
            ->get();
    }

    public function createMedal(string $medalType, int $athleteId, int $sportId): Medal
    {
        $medal = new Medal();
        $medal->type = $medalType;
        $medal->sport_id = $sportId;
        $medal->save();

        DB::table('athlete_medal')->insert(['athlete_id' => $athleteId, 'medal_id' => $medal->id]);

        return $medal;
    }

    public function deleteMedal(int $medalId): void
    {
        DB::table('athlete_medal')->where('medal_id','=', $medalId)->delete();
        Medal::query()->where('id','=',$medalId)->delete();
    }

}
