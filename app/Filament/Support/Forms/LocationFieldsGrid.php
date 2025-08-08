<?php

declare(strict_types=1);

namespace App\Filament\Support\Forms;

use App\Models\Enums\Country;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;

final class LocationFieldsGrid
{
    public static function make(): Grid
    {
        return Grid::make(2)
            ->schema([
                Select::make('country')
                    ->options(Country::getOptions())
                    ->required(),

                TextInput::make('city')
                    ->maxlength(40)
                    ->required(),
            ]);
    }
}
