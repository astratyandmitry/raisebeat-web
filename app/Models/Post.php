<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Commentable;
use App\Models\Contracts\Likeable;
use App\Models\Contracts\Viewable;
use App\Models\Enums\PostType;
use App\Models\Traits\HasComments;
use App\Models\Traits\HasReceivedActivities;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property-read int|null $parent_id
 * @property-read int $user_id
 * @property-read string $postable_type
 * @property-read int $postable_id
 * @property-read string $title
 * @property-read string|null $description
 * @property-read string|null $content
 * @property-read string|null $repost_comment
 * @property-read string|null $external_url
 * @property-read int $count_reposts
 * @property-read \Carbon\Carbon|null $published_at
 * @property-read \App\Models\Enums\PostType $type
 * @property-read \App\Models\Post|null $parent
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Abstracts\Organization|null $postable
 */
final class Post extends Model implements Viewable, Likeable, CanReceiveActivity, Commentable
{
    use HasReceivedActivities, HasComments;

    protected function casts(): array
    {
        return [
            'type' => PostType::class,
            'count_reposts' => 'integer',
            'count_views' => 'integer',
            'count_likes' => 'integer',
            'published_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'parent_id');
    }

    public function postable(): MorphTo
    {
        return $this->morphTo();
    }
}
