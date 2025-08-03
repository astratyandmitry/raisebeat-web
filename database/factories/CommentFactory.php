<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
final class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first(),
            'content' => $this->faker->sentence,
        ];
    }

    public function as_reply(): self
    {
        return $this->state(fn(array $attributes): array => [
            'parent_id' => Comment::query()->inRandomOrder()->first(),
        ]);
    }
}
