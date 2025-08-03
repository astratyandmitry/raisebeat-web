<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accelerator>
 */
final class AcceleratorFactory extends OrganizationFactory
{
    public function definition(): array
    {
        return [
            ...parent::definition(),
            'founded_year' => $this->faker->year,
            'country' => $this->faker->randomElement(Country::cases()),
            'city' => $this->faker->city,
        ];
    }
}
