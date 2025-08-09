<?php

declare(strict_types=1);

namespace App\Filament\Resources\Accelerators\Schemas;

use App\Filament\Support\Columns\LocationColumn;
use App\Models\Enums\Country;
use Filament\Tables\Filters\SelectFilter;

final class AcceleratorsTable
{
    public static function columns(): array
    {
        return [
            LocationColumn::make(),
        ];
    }

    public static function filters(): array
    {
        return [
            SelectFilter::make('country')
                ->options(Country::getOptions()),
        ];
    }
}
