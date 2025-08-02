<?php

declare(strict_types=1);

namespace App\Models\Abstracts;

use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * @property string $uuid
 * @property-read int $id
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
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
