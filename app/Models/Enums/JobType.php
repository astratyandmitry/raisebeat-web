<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum JobType: string
{
    use HasLocalizedInformation;

    case CoFounder = 'co-founder';
    case FullTime = 'full-time';
    case PartTime = 'part-time';
    case Freelance = 'freelance';
}
