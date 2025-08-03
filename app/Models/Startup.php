<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Organization;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Followable;
use App\Models\Contracts\Linkable;
use App\Models\Contracts\Verifiable;
use App\Models\Contracts\Viewable;
use App\Models\Enums\BusinessModel;
use App\Models\Enums\Country;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\Region;
use App\Models\Enums\StartupStage;
use App\Models\Enums\TeamSize;
use App\Models\Traits\HasFollowers;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasPerformedActivities;
use App\Models\Traits\HasReceivedActivities;
use App\Models\Traits\HasVerifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
 * @property-read \App\Models\AcceleratorParticipant[]|\Illuminate\Database\Eloquent\Collection $accelerators_participation
 * @property-read \App\Models\Investment[]|\Illuminate\Database\Eloquent\Collection $investments
 * @property-read \App\Models\StartupMetric[]|\Illuminate\Database\Eloquent\Collection $metrics
 * @property-read \App\Models\StartupVacancy[]|\Illuminate\Database\Eloquent\Collection $vacancies
 */
final class Startup extends Organization implements
    CanPerformActivity, CanReceiveActivity, Followable, Linkable, Verifiable, Viewable
{
    /** @use HasFactory<\Database\Factories\StartupFactory> */
    use HasPerformedActivities, HasReceivedActivities, HasFollowers, HasLinks, HasVerifications, HasFactory;

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

    public function accelerators_participation(): HasMany
    {
        return $this->hasMany(AcceleratorParticipant::class);
    }

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class);
    }

    public function metrics(): HasMany
    {
        return $this->hasMany(StartupMetric::class);
    }

    public function vacancies(): HasMany
    {
        return $this->hasMany(StartupVacancy::class);
    }
}
