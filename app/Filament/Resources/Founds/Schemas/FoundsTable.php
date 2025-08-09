<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Schemas;

use App\Filament\Support\Columns\LocationColumn;
use App\Models\Enums\Country;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\Region;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

final class FoundsTable
{
    public static function columns(): array
    {
        return [
            LocationColumn::make(),
            TextColumn::make('focus_region')
                ->width(80)
                ->label('Region')
                ->badge()
                ->color('gray'),
            TextColumn::make('investment_model')
                ->width(80)
                ->label('Model')
                ->badge()
                ->color('gray'),
        ];
    }

    public static function filters(): array
    {
        return [
            SelectFilter::make('country')
                ->options(Country::getOptions()),
            SelectFilter::make('focus_region')
                ->label('Region')
                ->options(Region::getOptions()),
            SelectFilter::make('investment_model')
                ->label('Model')
                ->options(InvestmentModel::getOptions()),
        ];
    }
}
