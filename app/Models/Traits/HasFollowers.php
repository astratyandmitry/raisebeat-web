<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Follow;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Model
 *
 * @implements \App\Models\Contracts\Followable
 */
trait HasFollowers
{
    public function followers(): MorphMany
    {
        return $this->morphMany(Follow::class, 'followable');
    }
}
