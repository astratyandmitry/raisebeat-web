<?php

namespace App\Models\Traits;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property-read \App\Models\Comment[]|\Illuminate\Database\Eloquent\Collection $comments
 * @mixin \App\Models\Abstracts\Model
 * @implements \App\Models\Contracts\Commentable
 */
trait HasComments
{
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
