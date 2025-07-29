<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

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
