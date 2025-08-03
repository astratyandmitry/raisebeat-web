<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\MemberType;
use App\Models\Startup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StartupMetric>
 */
final class StartupMetricFactory extends Factory
{
    public function definition(): array
    {
        return [
            'startup_id' => Startup::query()->inRandomOrder()->first(),
            'year' => $this->faker->numberBetween(2000, 2020),
            'quarter' => $this->faker->randomElement(['q1', 'q2', 'q3', 'q4']),
            'value' => $this->faker->numberBetween(10, 100),
            'type' => $this->faker->randomElement(MemberType::cases()),
            'is_confirmed' => $this->faker->boolean,
        ];
    }
}
