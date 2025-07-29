<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Enums\Region;

/**
 * @property-read int $user_id
 * @property-read float|null $check_size_min
 * @property-read float|null $check_size_max
 * @property-read string $focus_headline
 * @property-read \App\Models\Enums\Region $focus_region
 */
final class Investor extends Model
{
    protected function casts(): array
    {
        return [
            'check_size_min' => 'float',
            'check_size_max' => 'float',
            'focus_region' => Region::class,
        ];
    }
}
