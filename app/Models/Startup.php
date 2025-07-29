<?php

namespace App\Models;

use App\Models\Abstracts\Organization;
use App\Models\Enums\BusinessModel;
use App\Models\Enums\Country;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\Region;
use App\Models\Enums\StartupStage;
use App\Models\Enums\TeamSize;

/**
 * @property-read string $market_problem
 * @property-read string $market_solution
 * @property-read string $city
 * @property-read int $founded_year
 * @property-read string|null $demo_url
 * @property-read string|null $deck_url
 * @property-read boolean $is_demo_private
 * @property-read boolean $is_deck_private
 * @property-read \App\Models\Enums\Country $country
 * @property-read \App\Models\Enums\Region $market_region
 * @property-read \App\Models\Enums\BusinessModel $business_model
 * @property-read \App\Models\Enums\StartupStage $stage
 * @property-read \App\Models\Enums\FundraisingStatus $fundraising_status
 * @property-read \App\Models\Enums\FundraisingRound|null $fundraising_round
 * @property-read \App\Models\Enums\TeamSize $team_size
 *
 */
final class Startup extends Organization
{
    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'founded_year' => 'integer',
            'is_demo_private' => 'boolean',
            'is_deck_private' => 'boolean',
            'country' => Country::class,
            'market_region' => Region::class,
            'business_model' => BusinessModel::class,
            'stage' => StartupStage::class,
            'fundraising_status' => FundraisingStatus::class,
            'fundraising_round' => FundraisingRound::class,
            'team_size' => TeamSize::class,
        ];
    }
}
