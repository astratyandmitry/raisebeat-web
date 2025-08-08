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
    private static ?string $password = null;

    public function definition(): array
    {
        return [
            'email' => $email = $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => self::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'headline' => $this->faker->sentence,
            'bio' => $this->faker->paragraph,
            'avatar_url' => "https://i.pravatar.cc/300?u=$email",
            'country' => $this->faker->randomElement(Country::cases()),
            'city' => $this->faker->city,
            'timezone' => $this->faker->randomElement(Timezone::cases()),
            'language' => $this->faker->randomElement(Language::cases()),
        ];
    }

    public function unverified(): self
    {
        return $this->state(fn (array $attributes): array => [
            'email_verified_at' => null,
        ]);
    }
}
