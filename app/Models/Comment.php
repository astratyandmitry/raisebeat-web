<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Commentable;
use App\Models\Contracts\Likeable;
use App\Models\Traits\HasReceivedActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property-read int|null $parent_id
 * @property-read int $user_id
 * @property-read string $commentable_type
 * @property-read int $commentable_id
 * @property-read string $content
 * @property-read \App\Models\Comment|null $parent
 * @property-read \App\Models\Comment[]|\Illuminate\Database\Eloquent\Collection $replies
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Contracts\Commentable $commentable
 */
final class Comment extends Model implements Likeable, CanReceiveActivity
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory, SoftDeletes, HasReceivedActivities;

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Commentable::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Commentable::class, 'parent_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
