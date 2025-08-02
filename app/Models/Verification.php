<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use App\Models\Contracts\Verifiable;
use App\Models\Abstracts\Model;
use App\Models\Enums\VerificationStatus;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read string $verifiable_type
 * @property-read int $verifiable_id
 * @property-read string|null $comment
 * @property-read VerificationStatus $status
 * @property-read Carbon|null $requested_at
 * @property-read Carbon|null $responded_at
 * @property-read Verifiable $verifiable
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

    public function verifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
