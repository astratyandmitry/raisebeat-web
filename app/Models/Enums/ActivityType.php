<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum ActivityType: string
{
    use HasLocalizedInformation;

    case View = 'view';
}
