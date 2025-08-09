<?php

namespace App\Filament\Support\Filters;

use App\Filament\Support\Helpers\YearsList;
use App\Models\Enums\Quarter;
use Filament\Tables\Filters\SelectFilter;

final class YearQuarterFilters
{
    /**
     * @return array<SelectFilter>
     */
    public static function make(): array
    {
        return [
            SelectFilter::make('year')
                ->options(YearsList::generate()),
            SelectFilter::make('quarter')
                ->multiple()
                ->options(Quarter::getOptions()),
        ];
    }
}
