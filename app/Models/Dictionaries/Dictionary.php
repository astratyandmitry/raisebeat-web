<?php

namespace App\Models\Dictionaries;

use App\Models\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $key
 * @property string|array $name
 * @property int $sort_order
 * @property boolean $is_active
 */
abstract class Dictionary extends Model
{
    use HasTranslations;

    protected array $translatable = ['name'];
}
