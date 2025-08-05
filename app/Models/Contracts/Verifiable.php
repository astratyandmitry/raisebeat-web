<?php

declare(strict_types=1);

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property-read \App\Models\Verification|null $latest_verification
 * @property-read \App\Models\Verification[]|\Illuminate\Database\Eloquent\Collection $verifications_history
 * @mixin \App\Models\User
 * @mixin \App\Models\Abstracts\Organization
 */
interface Verifiable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne<\App\Models\Verification>
     */
    public function latest_verification(): MorphOne;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany<\App\Models\Verification>
     */
    public function verifications_history(): MorphMany;
}
