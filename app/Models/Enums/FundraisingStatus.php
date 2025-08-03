<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum FundraisingStatus: string
{
    use HasLocalizedInformation;

    case NotRaising = 'not_raising';
    case Active = 'active';
    case SoftCommit = 'soft_commit';
    case Closed = 'closed';
}
