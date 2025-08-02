<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Organization;
use App\Models\Enums\Country;

/**
 * @property-read int $founded_year
 * @property-read string $city
 * @property-read Country $country
 */
class Accelerator extends Organization
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
