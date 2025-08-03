<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Followable;
use App\Models\Contracts\Linkable;
use App\Models\Contracts\Verifiable;
use App\Models\Contracts\Viewable;
use App\Models\Enums\Region;
use App\Models\Traits\HasFollowers;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasPerformedActivities;
use App\Models\Traits\HasReceivedActivities;
use App\Models\Traits\HasVerifications;

/**
 * @property-read int $user_id
 * @property-read float|null $check_size_min
 * @property-read float|null $check_size_max
 * @property-read string $focus_headline
 * @property-read \App\Models\Enums\Region $focus_region
 */
final class Investor extends Model implements
    CanPerformActivity, CanReceiveActivity, Followable, Linkable, Verifiable, Viewable
{
    use HasPerformedActivities, HasReceivedActivities, HasFollowers, HasLinks, HasVerifications;

    protected function casts(): array
    {
        return [
            'check_size_min' => 'float',
            'check_size_max' => 'float',
            'focus_region' => Region::class,
        ];
    }
}
