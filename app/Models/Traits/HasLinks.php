<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Link;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Model
 */
trait HasLinks
{
    public function links(): MorphMany
    {
        return $this->morphMany(Link::class, 'social_linkable');
    }
}
