<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PostType: string implements HasColor, HasLabel
{
    use HasLocalizedInformation;

    case InvestorUpdate = 'investor_update';
    case Update = 'update';
    case Milestone = 'milestone';
    case Announcement = 'announcement';
    case Hiring = 'hiring';
    case MediaMention = 'media_mention';
    case Commentary = 'commentary';

    public function getColor(): string
    {
        return match ($this) {
            self::InvestorUpdate, self::Update => 'danger',
            self::Milestone, self::Announcement => 'success',
            self::Hiring => 'warning',
            self::MediaMention => 'info',
            default => 'gray',
        };
    }
}
