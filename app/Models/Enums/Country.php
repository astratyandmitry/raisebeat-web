<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasLabel;

enum Country: string implements HasLabel
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
