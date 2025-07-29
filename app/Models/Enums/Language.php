<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum Language: string
{
    use HasLocalizedInformation;

    case Russian = 'RU';
    case English = 'EN';
}
