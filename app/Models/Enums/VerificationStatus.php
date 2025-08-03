<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum VerificationStatus: string
{
    use HasLocalizedInformation;

    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}
