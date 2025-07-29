<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum Country: string
{
    use HasLocalizedInformation;

    case Armenia = 'AM';
    case Azerbaijan = 'AZ';
    case Belarus = 'BY';
    case Georgia = 'GE';
    case Kazakhstan = 'KZ';
    case Kyrgyzstan = 'KG';
    case Russia = 'RU';
    case Tajikistan = 'TJ';
    case Turkmenistan = 'TM';
    case Ukraine = 'UA';
    case Uzbekistan = 'UZ';
}
