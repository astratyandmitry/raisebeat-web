<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasLabel;

enum InvestmentModel: string implements HasLabel
{
    use HasLocalizedInformation;

    case Equity = 'equity';
    case Revenue = 'revenue';
    case Safe = 'safe';
    case Convertible = 'convertible';
    case Grant = 'grant';
    case Debt = 'debt';
}
