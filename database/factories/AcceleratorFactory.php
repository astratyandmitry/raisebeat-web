<?php

namespace Database\Factories;

use App\Models\Enums\Country;
use Illuminate\Support\Str;

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
