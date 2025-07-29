<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum Region: string
{
    use HasLocalizedInformation;

    case CIS = 'cis';
    case MENA = 'mena';
    case CentralAsia = 'central_asia';
    case Europe = 'europe';
    case Global = 'global';
}
