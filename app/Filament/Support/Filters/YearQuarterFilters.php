<?php

declare(strict_types=1);

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
                ->native(false)
                ->options(YearsList::generate()),
            SelectFilter::make('quarter')
                ->native(false)
                ->multiple()
                ->options(Quarter::getOptions()),
        ];
    }
}
