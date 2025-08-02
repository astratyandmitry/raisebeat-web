<?php

declare(strict_types=1);

namespace App\Models\Abstracts;

use Spatie\Translatable\HasTranslations;

/**
 * @property-read string $key
 * @property-read string|array $name
 * @property-read boolean $is_active
 * @property int $sort_order
 */
abstract class Dictionary extends Model
{
    use HasTranslations;

    protected array $translatable = ['name'];

    public static function boot(): void
    {
        parent::boot();

        self::creating(function (self $model): void {
            $model->sort_order = (int) self::query()->max('sort_order') + 1;
        });
    }
}
