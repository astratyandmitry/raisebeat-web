<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Model
 */
interface Postable
{
    public function posts(): MorphMany;
}
