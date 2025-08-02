<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use App\Models\Link;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read Link[]|Collection $social_links
 */
interface Linkable
{
    public function social_links(): MorphMany;
}
