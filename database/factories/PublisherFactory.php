<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\PublisherType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
final class PublisherFactory extends OrganizationFactory
{
    public function definition(): array
    {
        return [
            ...parent::definition(),
            'type' => $this->faker->randomElement(PublisherType::cases()),
            'official_url' => $this->faker->url,
            'submission_url' => $this->faker->optional(0.5)->url,
        ];
    }
}
