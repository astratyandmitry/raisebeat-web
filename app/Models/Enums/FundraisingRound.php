<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum FundraisingRound: string implements HasLabel, HasColor
{
    use HasLocalizedInformation;

    case PreSeed = 'pre-seed';
    case Seed = 'seed';
    case SeriesA = 'series_a';
    case SeriesB = 'series_b';
    case Bridge = 'bridge';
    case Grant = 'grant';

    public function getColor(): string
    {
        return  match ($this) {
            self::PreSeed => 'info',
            self::Seed => 'success',
            self::SeriesA => 'danger',
            self::SeriesB => 'warning',
            self::Bridge, self::Grant => 'gray',
        };
    }
}
