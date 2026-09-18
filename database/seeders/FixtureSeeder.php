<?php

namespace Database\Seeders;

use App\Models\Fixture;
use App\RugbyType;
use Illuminate\Database\Seeder;

class FixtureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->withProgressBar(RugbyType::cases(), function (RugbyType $type) {
            Fixture::factory(50)->forRugbyType($type)->create();
        });
        $this->command->newLine();
    }
}
