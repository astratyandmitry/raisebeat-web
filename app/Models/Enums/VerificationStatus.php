<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum VerificationStatus: string
{
    use HasLocalizedInformation;

    case Pending = 'pending';
    case Accepted = 'accepted';
    case Rejected = 'rejected';
}
