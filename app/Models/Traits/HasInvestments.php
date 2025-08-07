<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Investment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Model
 *
 * @implements \App\Models\Contracts\Investable
 */
trait HasInvestments
{
    public function investments(): MorphMany
    {
        return $this->morphMany(Investment::class, 'investable');
    }
}
