<?php

namespace Database\Factories;


use App\Models\Enums\BusinessModel;
use App\Models\Enums\Country;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\Region;
use App\Models\Enums\StartupStage;
use App\Models\Enums\TeamSize;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Startup>
 */
final class StartupFactory extends OrganizationFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ...parent::definition(),
            'market_problem' => $this->faker->paragraph(5),
            'market_solution' => $this->faker->paragraph(5),
            'market_region' => $this->faker->randomElement(Region::cases()),
            'country' => $this->faker->randomElement(Country::cases()),
            'city' => $this->faker->city,
            'founded_year' => $this->faker->year,
            'business_model' => $this->faker->randomElement(BusinessModel::cases()),
            'stage' => $this->faker->randomElement(StartupStage::cases()),
            'fundraising_status' => $this->faker->randomElement(FundraisingStatus::cases()),
            'fundraising_round' => $this->faker->randomElement(FundraisingRound::cases()),
            'team_size' => $this->faker->randomElement(TeamSize::cases()),
            'demo_url' => $this->faker->optional()->url,
            'deck_url' => $this->faker->optional()->url,
        ];
    }
}
