<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum MetricType: string
{
    use HasLocalizedInformation;

    case MRR = 'MRR';
    case ARPU = 'ARPU';
    case CAC = 'CAC';
    case LTV = 'LTV';
    case DAU = 'DAU';
    case MAU = 'MAU';
    case CHURN = 'CHURN';
}
