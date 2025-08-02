<?php

declare(strict_types=1);

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum TeamSize: string
{
    use HasLocalizedInformation;

    case PEOPLE_1_3 = '1-3';
    case PEOPLE_4_10 = '4-10';
    case PEOPLE_11_20 = '11-20';
    case PEOPLE_21_50 = '21-50';
    case PEOPLE_50_100 = '50-100';
    case PEOPLE_100_plus = '100+';
}
