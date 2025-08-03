<?php

namespace Database\Factories;

use App\Models\Enums\MemberType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
final class MemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first(),
            'headline' => $this->faker->optional()->sentence,
            'type' => $this->faker->randomElement(MemberType::cases())
        ];
    }
}
