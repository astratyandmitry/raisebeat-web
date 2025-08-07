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
use App\Models\Traits\HasFollowers;
use App\Models\Traits\HasInvestments;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasPerformedActivities;
use App\Models\Traits\HasReceivedActivities;
use App\Models\Traits\HasVerifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $founded_year
 * @property-read string $city
 * @property-read \App\Models\Enums\Country $country
 * @property-read \App\Models\AcceleratorParticipant[]|\Illuminate\Database\Eloquent\Collection $participators
 */
final class Accelerator extends Organization implements CanPerformActivity, CanReceiveActivity, Followable, Investable, Linkable, Verifiable, Viewable
{
    /** @use HasFactory<\Database\Factories\AcceleratorFactory> */
    use HasFactory, HasFollowers, HasInvestments, HasLinks, HasPerformedActivities, HasReceivedActivities, HasVerifications;

    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'founded_year' => 'integer',
            'country' => Country::class,
        ];
    }

    public function participators(): HasMany
    {
        return $this->hasMany(AcceleratorParticipant::class);
    }
}
