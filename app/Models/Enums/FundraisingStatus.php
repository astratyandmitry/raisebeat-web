<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum FundraisingStatus: string
{
    use HasLocalizedInformation;

    case NotRaising = 'not_raising';
    case Active = 'active';
    case SoftCommit = 'soft_commit';
    case Closed = 'closed';
}
