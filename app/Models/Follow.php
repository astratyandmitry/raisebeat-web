<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $user_id
 * @property string $followable_type
 * @property string $followable_id
 * @property string $followable
 */
final class Follow extends Model
{
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'followable_id' => 'integer',
        ];
    }

    public function followable(): MorphTo
    {
        return $this->morphTo();
    }
}
