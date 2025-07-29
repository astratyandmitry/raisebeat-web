<?php

namespace App\Models;

use App\Models\Abstracts\Focusable;
use App\Models\Abstracts\Organization;
use App\Models\Enums\Country;

/**
 * @property-read int $founded_year
 * @property-read string $city
 * @property-read \App\Models\Enums\Country $country
 */
final class Accelerator extends Organization implements Focusable
{
    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'founded_year' => 'integer',
            'country' => Country::class,
        ];
    }
}
