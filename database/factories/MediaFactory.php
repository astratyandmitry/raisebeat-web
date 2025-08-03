<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\MediaType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
final class MediaFactory extends OrganizationFactory
{
    public function definition(): array
    {
        return [
            ...parent::definition(),
            'type' => $this->faker->randomElement(MediaType::cases()),
            'submission_url' => $this->faker->optional(0.5)->url,
        ];
    }
}
