<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\Country;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\Region;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Found>
 */
final class FoundFactory extends OrganizationFactory
{
    public function definition(): array
    {
        return [
            ...parent::definition(),
            'founded_year' => $this->faker->year,
            'check_size_min' => $this->faker->numberBetween(1000, 10000),
            'check_size_max' => $this->faker->numberBetween(10000, 100000),
            'focus_region' => $this->faker->randomElement(Region::cases()),
            'investment_model' => $this->faker->randomElement(InvestmentModel::cases()),
            'country' => $this->faker->randomElement(Country::cases()),
            'city' => $this->faker->city,
            'is_lead_investor' => $this->faker->boolean,
            'is_follow_investor' => $this->faker->boolean,
        ];
    }

    public function lead_investor(): self
    {
        return $this->state(fn(array $attributes): array => [
            'is_lead_investor' => true,
        ]);
    }

    public function follow_investor(): self
    {
        return $this->state(fn(array $attributes): array => [
            'is_follow_investor' => false,
        ]);
    }
}
