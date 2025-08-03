<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read \App\Models\Activity[]|\Illuminate\Database\Eloquent\Collection $performed_activities
 * @mixin \App\Models\Abstracts\Model
 */
interface CanPerformActivity
{
    public function performed_activities(): MorphMany;
}
