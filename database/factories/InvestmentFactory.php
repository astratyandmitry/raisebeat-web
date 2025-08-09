<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\Quarter;
use App\Models\Startup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Investment>
 */
final class InvestmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'startup_id' => Startup::query()->inRandomOrder()->first(),
            'year' => $this->faker->numberBetween(2000, 2020),
            'quarter' => $this->faker->randomElement(Quarter::cases()),
            'amount_usd' => $this->faker->numberBetween(10_000, 100_000),
            'is_confirmed' => $this->faker->boolean,
        ];
    }
}
