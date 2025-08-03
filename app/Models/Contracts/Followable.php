<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property-read int $followers_count
 * @property-read \App\Models\Follow[]|\Illuminate\Support\Collection $followers
 * @mixin \App\Models\Abstracts\Model
 */
interface Followable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany<\App\Models\Follow>
     */
    public function followers(): MorphToMany;
}
