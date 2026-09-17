<?php

namespace Database\Seeders;

use App\Models\Fixture;
use Illuminate\Database\Seeder;

class FixtureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fixture::factory(20)->create();
    }
}
