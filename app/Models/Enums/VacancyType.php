<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasLabel;

enum VacancyType: string implements HasLabel
{
    use HasLocalizedInformation;

    case CoFounder = 'co-founder';
    case FullTime = 'full-time';
    case PartTime = 'part-time';
    case Freelance = 'freelance';
}
