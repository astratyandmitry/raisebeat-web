<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasLabel;

enum Language: string implements HasLabel
{
    use HasLocalizedInformation;

    case Russian = 'RU';
    case English = 'EN';
}
