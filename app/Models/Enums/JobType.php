<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum JobType: string
{
    use HasLocalizedInformation;

    case CoFounder = 'co-founder';
    case FullTime = 'full-time';
    case PartTime = 'part-time';
    case Freelance = 'freelance';
}
