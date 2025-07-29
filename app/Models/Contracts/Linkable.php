<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read \App\Models\Link[]|\Illuminate\Database\Eloquent\Collection $social_links
 */
interface Linkable
{
    public function social_links(): MorphMany;
}
