<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

abstract class OrganizationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $name = $this->faker->unique()->company,
            'slug' => Str::slug($name),
            'headline' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'logo_url' => $this->faker->imageUrl(400, 400),
            'contact_website' => $this->faker->url,
            'contact_email' => $this->faker->email,
            'contact_phone' => $this->faker->phoneNumber,
            'is_public' => true,
        ];
    }

    public function hidden(): static
    {
        return $this->state(fn(array $attributes): array => [
            'is_public' => false,
        ]);
    }
}
