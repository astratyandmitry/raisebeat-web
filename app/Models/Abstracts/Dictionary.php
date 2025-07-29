<?php

namespace App\Models\Abstracts;

use Spatie\Translatable\HasTranslations;

/**
 * @property-read string $key
 * @property-read string|array $name
 * @property-read int $sort_order
 * @property-read boolean $is_active
 */
abstract class Dictionary extends Model
{
    use HasTranslations;

    protected array $translatable = ['name'];
}
