<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Model
 *
 * @implements \App\Models\Contracts\CanReceiveActivity
 */
trait HasReceivedActivities
{
    public function received_activities(): MorphMany
    {
        return $this->morphMany(Activity::class, 'subjectable');
    }
}
