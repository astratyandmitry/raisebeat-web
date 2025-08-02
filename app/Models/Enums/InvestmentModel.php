<?php

declare(strict_types=1);

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum InvestmentModel: string
{
    use HasLocalizedInformation;

    case Equity = 'equity';
    case Revenue = 'revenue';
    case Safe = 'safe';
    case Convertible = 'convertible';
    case Grant  = 'grant';
    case Debt = 'debt';
}
