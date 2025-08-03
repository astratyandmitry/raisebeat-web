<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Enums\NotificationType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read int $user_id
 * @property-read string $entity_type
 * @property-read int $entity_id
 * @property-read array|null $data
 * @property-read \Carbon\Carbon|null $read_at
 * @property-read \App\Models\Enums\NotificationType $type
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Abstracts\Model $entity
 */
final class Notification extends Model
{
    protected function casts(): array
    {
        return [
            'type' => NotificationType::class,
            'read_at' => 'datetime',
            'data' => 'json',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function entity(): MorphTo
    {
        return $this->morphTo();
    }
}
