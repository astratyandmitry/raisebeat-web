<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read \App\Models\Link[]|\Illuminate\Database\Eloquent\Collection $links
 * @mixin \App\Models\Abstracts\Model
 */
interface Linkable
{
    public function links(): MorphMany;
}
