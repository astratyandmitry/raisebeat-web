<?php

namespace App\Models;

use Illuminate\Support\Str;

/**
 * @property int $id
 * @property \Ramsey\Uuid\Uuid $uuid
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    public static function boot(): void
    {
        parent::boot();

        self::creating(function (self $model) {
            $model->uuid = Str::uuid();
        });
    }
}
