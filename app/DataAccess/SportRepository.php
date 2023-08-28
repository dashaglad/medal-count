<?php

declare(strict_types=1);

namespace App\DataAccess;

use App\Models\Medal;
use App\Models\Sport;
use Illuminate\Support\Collection;

class SportRepository
{
    public function getById(int $sportId): ?Sport
    {
        return Sport::query()->where('id', '=', $sportId)->get()->first();
    }

    /**
     * @return Collection<int, Sport>
     */
    public function getSports(): Collection
    {
        return Sport::query()->get();
    }

    public function createSport(string $title): Sport
    {
        $sport = new Sport();
        $sport->title = $title;
        $sport->save();

        return $sport;
    }

    public function deleteSport(int $sportId): void
    {
        Medal::query()->where('sport_id', '=', $sportId)->delete();
        Sport::query()->where('id', '=', $sportId)->delete();
    }

    public function getSportOfMedal(int $medalId): Sport
    {
        $medal = Medal::query()->where('id', '=', $medalId)->get()->first();
        return Sport::query()->where('id', '=', $medal->sport_id)->get()->first();
    }
}
