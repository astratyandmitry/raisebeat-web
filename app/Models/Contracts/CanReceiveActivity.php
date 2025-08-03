<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read \App\Models\Activity[]|\Illuminate\Database\Eloquent\Collection $received_activities
 * @mixin \App\Models\Abstracts\Model
 */
interface CanReceiveActivity
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany<\App\Models\Activity>
     */
    public function received_activities(): MorphMany;
}
