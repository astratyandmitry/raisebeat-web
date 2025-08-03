<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\Country;
use App\Models\Enums\Language;
use App\Models\Enums\Timezone;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
final class UserFactory extends Factory
{
    protected static ?string $password = null;

    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'headline' => $this->faker->sentence,
            'bio' => $this->faker->paragraph,
            'avatar_url' => $this->faker->imageUrl(400, 400),
            'country' => $this->faker->randomElement(Country::cases()),
            'city' => $this->faker->city,
            'timezone' => $this->faker->randomElement(Timezone::cases()),
            'language' => $this->faker->randomElement(Language::cases()),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes): array => [
            'email_verified_at' => null,
        ]);
    }

    public function blocked(): static
    {
        return $this->state(fn(array $attributes): array => [
            'is_blocked' => true,
        ]);
    }
}
