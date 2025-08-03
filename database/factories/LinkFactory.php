<?php

namespace Database\Factories;

use App\Models\Enums\LinkType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
final class LinkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'url' => $this->faker->url,
            'type' => $this->faker->randomElement(LinkType::class),
        ];
    }
}
