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
        $type = $this->faker->randomElement(RugbyType::cases());
        $start = $this->faker->dateTimeBetween(now()->subMonth(), now()->addMonth());
        $hasHappened = $start < now();
        $hurricanesScore = null;
        $oppositionScore = null;
        $report = null;

        if ($hasHappened) {
            $hurricanesScore = $this->getReasonableScoreForTypeOfRugby($type);
            $oppositionScore = $this->getReasonableScoreForTypeOfRugby($type);
            $report = $this->faker->text();
        }

        return [
            'type' => $type,
            'opposition' => $this->faker->city().' '.$this->faker->word(),
            'location' => $this->faker->country(),
            'start' => $start,
            'hurricanes_score' => $hurricanesScore,
            'opposition_score' => $oppositionScore,
            'report' => $report,
        ];
    }

    public function forRugbyType(RugbyType $type): static
    {
        return $this->state(function (array $attributes) use ($type) {
            return ['type' => $type,
                'hurricanes_score' => $attributes['start'] < now() ? $this->getReasonableScoreForTypeOfRugby($type) : null,
                'opposition_score' => $attributes['start'] < now() ? $this->getReasonableScoreForTypeOfRugby($type) : null,
            ];
        });
    }

    private function getReasonableScoreForTypeOfRugby(RugbyType $type): int
    {
        switch ($type) {
            case RugbyType::TOUCH:
                return $this->faker->numberBetween(1, 10);
            case RugbyType::UNION:
                $tries = $this->faker->numberBetween(0, 5);
                $conversions = $this->faker->numberBetween(0, $tries);

                return (5 * $tries) + (2 * $conversions);
            default: return 0;
        }
    }
}
