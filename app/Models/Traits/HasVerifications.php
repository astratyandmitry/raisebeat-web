<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Abstracts\Model;
use App\Models\Verification;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin Model
 */
trait HasVerifications
{
    public function latest_verification(): HasOne
    {
        return $this->hasOne(Verification::class)->latestOfMany();
    }

    public function verifications_history(): HasMany
    {
        return $this->hasMany(Verification::class)->latest();
    }
}
