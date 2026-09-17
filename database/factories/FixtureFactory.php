<?php

namespace Database\Factories;

use App\Models\Fixture;
use App\RugbyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fixture>
 */
class FixtureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(RugbyType::cases()),
            'opposition' => $this->faker->city().' '.$this->faker->word(),
            'location' => $this->faker->country(),
            'start' => $this->faker->dateTime(),
        ];
    }
}
