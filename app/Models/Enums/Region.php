<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasLabel;

enum Region: string implements HasLabel
{
    use HasLocalizedInformation;

    case CIS = 'cis';
    case MENA = 'mena';
    case CentralAsia = 'central_asia';
    case Europe = 'europe';
    case Global = 'global';
}
