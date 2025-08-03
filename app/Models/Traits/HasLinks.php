<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Link;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Model
 * @implements \App\Models\Contracts\Linkable
 */
trait HasLinks
{
    public function links(): MorphMany
    {
        return $this->morphMany(Link::class, 'linkable');
    }
}
