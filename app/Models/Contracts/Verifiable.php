<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use App\Models\Verification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read Verification|null $latest_verification
 * @property-read Verification[]|Collection $verifications_history
 */
interface Verifiable
{
    public function latest_verification(): HasOne;

    public function verifications_history(): HasMany;
}
