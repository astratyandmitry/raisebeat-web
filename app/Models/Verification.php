<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Enums\VerificationStatus;
use App\Models\Traits\HasReceivedActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read string $verifiable_type
 * @property-read int $verifiable_id
 * @property-read string|null $comment
 * @property-read \App\Models\Enums\VerificationStatus $status
 * @property-read \Carbon\Carbon|null $requested_at
 * @property-read \Carbon\Carbon|null $responded_at
 * @property-read \App\Models\Contracts\Verifiable $verifiable
 */
final class Verification extends Model implements CanReceiveActivity
{
    /** @use HasFactory<\Database\Factories\VerificationFactory> */
    use HasFactory, HasReceivedActivities;

    protected function casts(): array
    {
        return [
            'status' => VerificationStatus::class,
            'requested_at' => 'datetime',
            'responded_at' => 'datetime',
        ];
    }

    public function verifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
