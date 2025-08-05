<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Organization
 * @mixin \App\Models\User
 * @implements \App\Models\Contracts\CanReceiveActivity
 */
trait HasPerformedActivities
{
    public function performed_activities(): MorphMany
    {
        return $this->morphMany(Activity::class, 'performable');
    }

    public function performer_user_id(): int
    {
        return $this->user_id;
    }
}
