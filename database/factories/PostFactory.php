<?php

namespace Database\Factories;

use App\Models\Enums\PostType;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
final class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first(),
            'type' => $this->faker->randomElement(PostType::cases()),
            'title' =>  $this->faker->sentence,
            'description' => $this->faker->optional()->paragraph,
            'content' => $this->faker->paragraphs(3, true),
            'published_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }

    public function as_repost(): self
    {
        return $this->state(fn (array $attributes): array => [
            'parent_id' => Post::query()->inRandomOrder()->first(),
            'repost_comment' => $this->faker->paragraph,
            'title' => null,
            'description' => null,
            'content' => null,
        ]);
    }

    public function as_external(): self
    {
        return $this->state(fn (array $attributes): array => [
            'external_url' => $this->faker->url,
            'title' => null,
            'description' => null,
            'content' => null,
        ]);
    }
}
