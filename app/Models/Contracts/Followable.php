<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property-read int $followers_count
 * @property-read \App\Models\Follow[]|\Illuminate\Support\Collection $followers
 */
interface Followable
{
    public function followers(): MorphToMany;
}
