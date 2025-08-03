<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read \App\Models\Activity[]|\Illuminate\Database\Eloquent\Collection $received_activities
 * @mixin \App\Models\Abstracts\Model
 */
interface CanReceiveActivity
{
    public function received_activities(): MorphMany;
}
