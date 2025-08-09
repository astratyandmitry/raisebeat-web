<?php

declare(strict_types=1);

namespace App\Filament\Support\Forms;

use App\Filament\Support\Helpers\YearsList;
use App\Models\Enums\Quarter;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;

final class YearQuarterSelectGroup
{
    public static function make(): Grid
    {
        return Grid::make(2)
            ->schema([
                Select::make('year')
                    ->options(YearsList::generate())
                    ->required(),
                Select::make('quarter')
                    ->options(Quarter::getOptions())
                    ->required(),
            ]);
    }
}
