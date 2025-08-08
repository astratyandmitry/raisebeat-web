<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum StartupStage: string implements HasLabel, HasColor
{
    use HasLocalizedInformation;

    case Idea = 'idea';
    case MVP = 'mvp';
    case Traction = 'traction';
    case Revenue = 'revenue';
    case Growth = 'growth';
    case Scale = 'scale';

    public function getColor(): string
    {
        return match ($this) {
            self::Idea => 'gray',
            self::MVP => 'info',
            self::Traction => 'success',
            self::Revenue => 'primary',
            self::Growth => 'danger',
            self::Scale => 'warning',
        };
    }
}
