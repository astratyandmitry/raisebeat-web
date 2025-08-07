<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Verification;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @mixin \App\Models\Abstracts\Model
 *
 * @implements \App\Models\Contracts\Verifiable
 */
trait HasVerifications
{
    public function latest_verification(): MorphOne
    {
        return $this->morphOne(Verification::class, 'verifiable')->latestOfMany();
    }

    public function verifications_history(): MorphMany
    {
        return $this->morphMany(Verification::class, 'verifiable')->latest();
    }
}
