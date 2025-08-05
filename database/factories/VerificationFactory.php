<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Actions\Activity\LogActivityAction;
use App\Models\Enums\ActivityType;
use App\Models\Enums\VerificationStatus;
use App\Models\Verification;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Verification>
 */
final class VerificationFactory extends Factory
{
    public function configure(): self
    {
        return $this->afterCreating(function (Verification $verification): void {
            /** @var \App\Models\Contracts\CanPerformActivity $performer */
            $performer = $verification->verifiable;

            (new LogActivityAction)->execute($performer, ActivityType::RequestVerification, $verification);
        });
    }

    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(VerificationStatus::cases()),
            'responded_at' => fn(array $attributes
            ) => $attributes['status'] === VerificationStatus::Pending ? null : now(),
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
