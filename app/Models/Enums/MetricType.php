<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

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
