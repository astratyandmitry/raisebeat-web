<?php

namespace Database\Factories;

use App\Models\Enums\VerificationStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Verification>
 */
final class VerificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(VerificationStatus::cases()),
            'responded_at' => function (array $attributes) {
                return $attributes['status'] === VerificationStatus::Pending ? null : now();
            },
            'requested_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }

    public function pending(): self
    {
        return $this->state(fn(array $attributes): array => [
            'status' => VerificationStatus::Pending,
            'responded_at' => null,
        ]);
    }

    public function accepted(): self
    {
        return $this->state(fn(array $attributes): array => [
            'status' => VerificationStatus::Accepted,
            'responded_at' => $this->faker->dateTimeBetween('-1 year'),
        ]);
    }

    public function rejected(): self
    {
        return $this->state(fn(array $attributes): array => [
            'status' => VerificationStatus::Rejected,
            'comment' => $this->faker->sentence,
            'responded_at' => $this->faker->dateTimeBetween('-1 year'),
        ]);
    }
}
