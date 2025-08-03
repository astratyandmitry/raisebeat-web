<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Enums\VacancyType;
use App\Models\Startup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StartupVacancy>
 */
final class StartupVacancyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'startup_id' => Startup::query()->inRandomOrder()->first(),
            'type' => $this->faker->randomElement(VacancyType::cases()),
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(3, true),
            'feedback_email' => $this->faker->safeEmail,
            'is_applicable' => $this->faker->boolean,
        ];
    }
}
