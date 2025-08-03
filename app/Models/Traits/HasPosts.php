<?php

namespace App\Models\Traits;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \App\Models\Abstracts\Model
 * @implements \App\Models\Contracts\Postable
 */
trait HasPosts
{
    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'postable');
    }
}
