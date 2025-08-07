<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Organization;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Followable;
use App\Models\Contracts\Investable;
use App\Models\Contracts\Linkable;
use App\Models\Contracts\Verifiable;
use App\Models\Contracts\Viewable;
use App\Models\Enums\Country;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\Region;
use App\Models\Traits\HasFollowers;
use App\Models\Traits\HasInvestments;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasPerformedActivities;
use App\Models\Traits\HasReceivedActivities;
use App\Models\Traits\HasVerifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property-read int $founded_year
 * @property-read float|null $check_size_min
 * @property-read float|null $check_size_max
 * @property-read string $city
 * @property-read bool $is_lead_investor
 * @property-read bool $is_follow_investor
 * @property-read \App\Models\Enums\Region $focus_region
 * @property-read \App\Models\Enums\InvestmentModel $investment_model
 * @property-read \App\Models\Enums\Country $country
 */
final class Found extends Organization implements CanPerformActivity, CanReceiveActivity, Followable, Investable, Linkable, Verifiable, Viewable
{
    /** @use HasFactory<\Database\Factories\FoundFactory> */
    use HasFactory, HasFollowers, HasInvestments, HasLinks, HasPerformedActivities, HasReceivedActivities, HasVerifications;

    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'check_size_min' => 'integer',
            'check_size_max' => 'integer',
            'is_lead_investor' => 'boolean',
            'is_follow_investor' => 'boolean',
            'investment_model' => InvestmentModel::class,
            'country' => Country::class,
            'focus_region' => Region::class,
        ];
    }
}
