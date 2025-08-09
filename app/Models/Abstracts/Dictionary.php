<?php

declare(strict_types=1);

namespace App\Models\Abstracts;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

/**
 * @property-read string $key
 * @property-read string|array $name
 * @property-read bool $is_active
 * @property int $sort_order
 */
abstract class Dictionary extends Model implements Sortable
{
    use HasTranslations, SortableTrait;

    protected array $translatable = ['name'];
}
