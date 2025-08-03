<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Investor>
 */
final class InvestorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'check_size_min' => $this->faker->numberBetween(1000, 10000),
            'check_size_max' => $this->faker->numberBetween(10000, 100000),
            'focus_headline' => $this->faker->sentence,
            'focus_region' => $this->faker->randomElement(Region::cases()),
        ];
    }
}
