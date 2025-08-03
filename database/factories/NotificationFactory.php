<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Accelerator;
use App\Models\Enums\NotificationType;
use App\Models\Found;
use App\Models\Startup;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
final class NotificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type' => $this->faker->randomElement(NotificationType::cases()),
            'read_at' => fake()->optional(0.6)->dateTimeBetween('-10 days'),
            'entity_type' => $this->faker->randomElement([Startup::class, Accelerator::class, Found::class]),
            'entity_id' => 1,
        ];
    }
}
