<?php

namespace App\Models\Enums;

enum ActivityType: string
{
    use HasLocalizedInformation;

    case View = 'view';
}
