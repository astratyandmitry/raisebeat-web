<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read \App\Models\Verification|null $latest_verification
 * @property-read \App\Models\Verification[]|\Illuminate\Database\Eloquent\Collection $verifications_history
 * @mixin \App\Models\Abstracts\Model
 */
interface Verifiable
{
    /**\
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<\App\Models\Verification>
     */
    public function latest_verification(): HasOne;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Verification>
     */
    public function verifications_history(): HasMany;
}
