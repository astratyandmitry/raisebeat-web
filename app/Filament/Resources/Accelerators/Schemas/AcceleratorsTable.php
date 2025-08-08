<?php

declare(strict_types=1);

namespace App\Filament\Resources\Accelerators\Schemas;

use App\Filament\Support\Columns\LocationColumn;
use App\Models\Enums\Country;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

final class AcceleratorsTable
{
    public static function columns(): array
    {
        return [
            LocationColumn::make(),
            IconColumn::make('is_public')
                ->width(40)
                ->label('Public')
                ->boolean(),
        ];
    }

    public static function filters(): array
    {
        return [
            SelectFilter::make('country')
                ->options(Country::getOptions()),
            TernaryFilter::make('is_public')->label('Public'),
        ];
    }
}
