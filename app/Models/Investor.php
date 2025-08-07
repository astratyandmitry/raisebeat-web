<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Followable;
use App\Models\Contracts\Investable;
use App\Models\Contracts\Linkable;
use App\Models\Contracts\Postable;
use App\Models\Contracts\Verifiable;
use App\Models\Contracts\Viewable;
use App\Models\Enums\Region;
use App\Models\Traits\HasFollowers;
use App\Models\Traits\HasInvestments;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasPerformedActivities;
use App\Models\Traits\HasPosts;
use App\Models\Traits\HasReceivedActivities;
use App\Models\Traits\HasVerifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $user_id
 * @property-read float|null $check_size_min
 * @property-read float|null $check_size_max
 * @property-read string $focus_headline
 * @property-read \App\Models\Enums\Region $focus_region
 * @property-read \App\Models\User $user
 */
final class Investor extends Model implements CanPerformActivity, CanReceiveActivity, Followable, Investable, Linkable, Postable, Verifiable, Viewable
{
    /** @use HasFactory<\Database\Factories\InvestorFactory> */
    use HasFactory,
        HasFollowers,
        HasInvestments,
        HasLinks,
        HasPerformedActivities,
        HasPosts,
        HasReceivedActivities,
        HasVerifications;

    protected function casts(): array
    {
        return [
            'check_size_min' => 'float',
            'check_size_max' => 'float',
            'focus_region' => Region::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getDisplayLabel(): string
    {
        return $this->name;
    }
}
