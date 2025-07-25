<?php

namespace App\Models\Dictionaries;

use App\Models\Model;
use Illuminate\Support\Str;

/**
 * @property string $key
 * @property string|array $name
 * @property int $sort_order
 * @property boolean $is_active
 */
abstract class Dictionary extends Model
{
    public function getTable(): string
    {
        $className = class_basename($this);

        return 'dict_'.Str::snake(Str::pluralStudly($className));
    }
}
