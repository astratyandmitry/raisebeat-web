<?php

declare(strict_types=1);

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
    public function followable(): MorphTo
    {
        return $this->morphTo();
    }
}
