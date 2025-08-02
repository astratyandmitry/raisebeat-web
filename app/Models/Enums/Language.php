<?php

declare(strict_types=1);

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum Language: string
{
    use HasLocalizedInformation;

    case Russian = 'RU';
    case English = 'EN';
}
