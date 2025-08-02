<?php

declare(strict_types=1);

namespace App\Models\Abstracts;

use Illuminate\Support\Str;

/**
 * @property string|\Ramsey\Uuid\Uuid $uuid
 * @property-read int $id
 * @property-read \Carbon\Carbon $created_at
 * @property-read \Carbon\Carbon $updated_at
 */
abstract class Model extends \Illuminate\Database\Eloquent\Model
{
    protected $guarded = [];

    public static function boot(): void
    {
        parent::boot();

        self::creating(function (self $model): void {
            $model->uuid = Str::uuid()->toString();
        });
    }
}
