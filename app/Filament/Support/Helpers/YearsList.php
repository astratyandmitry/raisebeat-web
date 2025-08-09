<?php

namespace App\Filament\Support\Helpers;

use Illuminate\Support\Collection;

final class YearsList
{
    public static function generate(): Collection
    {
        return collect(range(date('Y'), 2000))->mapWithKeys(fn($year) => [$year => $year]);
    }
}
