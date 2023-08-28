<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Country;
use App\Models\Medal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Country::factory(5)->create();

        DB::table('sports')->insert([
            ['title' => 'cricket'],
            ['title' => 'long jump'],
            ['title' => 'baseball']
        ]);

        Athlete::factory(10)->create();
        $medals = Medal::factory(10)->create();

        foreach ($medals as $medal) {
            DB::table('athlete_medal')->insert(
                ['athlete_id' => $medal->id, 'medal_id' => $medal->id]
            );
        }
    }
}
