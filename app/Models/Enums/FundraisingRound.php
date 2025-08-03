<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum FundraisingRound: string
{
    use HasLocalizedInformation;

    case PreSeed = 'pre-seed';
    case Seed = 'seed';
    case SeriesA = 'series_a';
    case SeriesB = 'series_b';
    case Bridge = 'bridge';
    case Grant = 'grant';
}
