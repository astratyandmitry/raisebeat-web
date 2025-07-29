<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Enums\VerificationStatus;

/**
 * @property-read string $verifiable_type
 * @property-read int $verifiable_id
 * @property-read string|null $comment
 * @property-read \App\Models\Enums\VerificationStatus $status
 * @property-read \Carbon\Carbon|null $requested_at
 * @property-read \Carbon\Carbon|null $responded_at
 */
final class Verification extends Model
{
    protected function casts(): array
    {
        return [
            'verifiable_id' => 'integer',
            'status' => VerificationStatus::class,
            'requested_at' => 'datetime',
            'verified_at' => 'datetime',
        ];
    }
}
