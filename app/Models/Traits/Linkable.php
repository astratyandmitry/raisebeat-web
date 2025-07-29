<?php

namespace App\Models\Traits;

use App\Models\Link;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Model
 */
trait Linkable
{
    public function social_links(): MorphMany
    {
        return $this->morphMany(Link::class, 'social_linkable');
    }
}
