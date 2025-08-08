<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum FundraisingStatus: string implements HasColor, HasLabel
{
    use HasLocalizedInformation;

    case NotRaising = 'not_raising';
    case Active = 'active';
    case SoftCommit = 'soft_commit';
    case Closed = 'closed';

    public function getColor(): string
    {
        return match ($this) {
            self::NotRaising => 'gray',
            self::Active => 'danger',
            self::SoftCommit => 'warning',
            self::Closed => 'success',
        };
    }
}
