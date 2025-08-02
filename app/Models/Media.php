<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Organization;
use App\Models\Enums\MediaType;

/**
 * @property-read string|null $submission_url
 * @property-read \App\Models\Enums\MediaType $type
 */
final class Media extends Organization
{
    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'type' => MediaType::class,
        ];
    }
}
