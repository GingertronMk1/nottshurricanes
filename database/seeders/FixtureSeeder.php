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
        $seedFixtures = function (RugbyType $type): void {
            Fixture::factory(50)->forRugbyType($type)->create();
        };

        if ($this->command === null) {
            foreach (RugbyType::cases() as $type) {
                $seedFixtures($type);
            }

            return;
        }

        $this->command->withProgressBar(RugbyType::cases(), $seedFixtures);
        $this->command->newLine();
    }
}
