<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Enums\InteractionStatus;
use App\Models\Enums\InteractionType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read int $user_id
 * @property-read string $from_entity_type
 * @property-read int $from_entity_id
 * @property-read string $to_entity_type
 * @property-read int $to_entity_id
 * @property-read string|null $message
 * @property-read array|null $data
 * @property-read \Carbon\Carbon|null $reviewed_at
 * @property-read \App\Models\Enums\InteractionType $type
 * @property-read \App\Models\Enums\InteractionStatus $status
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Contracts\Interactable $from_entity
 * @property-read \App\Models\Contracts\Interactable $to_entity
 */
final class Interaction extends Model
{
    protected function casts(): array
    {
        return [
            'type' => InteractionType::class,
            'status' => InteractionStatus::class,
            'reviewed_at' => 'datetime',
            'data' => 'json',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function from_entity(): MorphTo
    {
        return $this->morphTo();
    }

    public function to_entity(): MorphTo
    {
        return $this->morphTo();
    }
}
