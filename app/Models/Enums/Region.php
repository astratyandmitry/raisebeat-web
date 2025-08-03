<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum Region: string
{
    use HasLocalizedInformation;

    case CIS = 'cis';
    case MENA = 'mena';
    case CentralAsia = 'central_asia';
    case Europe = 'europe';
    case Global = 'global';
}
