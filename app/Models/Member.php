<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Enums\MemberType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read string $organization_type
 * @property-read int $organization_id
 * @property-read int $user_id
 * @property-read string|null $headline
 * @property-read \App\Models\Enums\MemberType $type
 * @property-read \App\Models\Abstracts\Organization $organization
 * @property-read \App\Models\User $user
 */
final class Member extends Model
{
    protected function casts(): array
    {
        return [
            'type' => MemberType::class,
        ];
    }

    public function organization(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
