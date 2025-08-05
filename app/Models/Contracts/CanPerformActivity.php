<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read \App\Models\Activity[]|\Illuminate\Database\Eloquent\Collection $performed_activities
 * @mixin \App\Models\Abstracts\Organization
 * @mixin \App\Models\User
 */
interface CanPerformActivity
{
    public function performer_user_id(): int;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany<\App\Models\Activity>
     */
    public function performed_activities(): MorphMany;
}
