<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Abstracts\Model;
use App\Models\Link;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin Model
 */
trait HasLinks
{
    public function social_links(): MorphMany
    {
        return $this->morphMany(Link::class, 'social_linkable');
    }
}
