<?php

declare(strict_types=1);

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum PostType: string
{
    use HasLocalizedInformation;

    case InvestorUpdate = 'investor_update';
    case Update = 'update';
    case Milestone = 'milestone';
    case Announcement = 'announcement';
    case Hiring = 'hiring';
    case MediaMention = 'media_mention';
    case Commentary = 'commentary';
}
