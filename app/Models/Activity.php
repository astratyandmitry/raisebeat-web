<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Enums\ActivityType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read int $user_id
 * @property-read string $performable_type
 * @property-read int $performable_id
 * @property-read string $subjectable_type
 * @property-read int $subjectable_id
 * @property-read array|null $data
 * @property-read \App\Models\Enums\ActivityType $type
 * @property-read \App\Models\User $user
 */
final class Activity extends Model
{
    protected function casts(): array
    {
        return [
            'type' => ActivityType::class,
            'data' => 'json',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function performer(): MorphTo
    {
        return $this->morphTo('performable');
    }

    public function subject(): MorphTo
    {
        return $this->morphTo('subjectable');
    }
}
