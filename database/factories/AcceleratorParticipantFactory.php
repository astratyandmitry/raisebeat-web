<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Startup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcceleratorParticipant>
 */
final class AcceleratorParticipantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'startup_id' => Startup::query()->inRandomOrder()->first(),
            'year' => $this->faker->numberBetween(2000, 2020),
            'quarter' => $this->faker->randomElement(['q1', 'q2', 'q3', 'q4']),
            'is_confirmed' => $this->faker->boolean,
        ];
    }
}
