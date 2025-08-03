<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin \App\Models\Abstracts\Model
 * @implements \App\Models\Contracts\Followable
 */
trait HasFollowers
{
    public function followers(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'followable', 'user_id');
    }
}
