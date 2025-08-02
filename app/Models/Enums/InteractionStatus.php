<?php

declare(strict_types=1);

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum InteractionStatus: string
{
    use HasLocalizedInformation;

    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Cancelled = 'cancelled';
}
