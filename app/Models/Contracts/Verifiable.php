<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read \App\Models\Verification|null $latest_verification
 * @property-read \App\Models\Verification[]|\Illuminate\Database\Eloquent\Collection $verifications_history
 */
interface Verifiable
{
    public function latest_verification(): HasOne;

    public function verifications_history(): HasMany;
}
