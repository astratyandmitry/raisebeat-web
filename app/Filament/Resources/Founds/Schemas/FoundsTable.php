<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Schemas;

use App\Filament\Support\Columns\LocationColumn;
use App\Models\Enums\Country;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\Region;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

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
            SelectFilter::make('focus_region')
                ->label('Region')
                ->options(Region::getOptions()),
            SelectFilter::make('investment_model')
                ->label('Model')
                ->options(InvestmentModel::getOptions()),
            TernaryFilter::make('is_public')->label('Public'),
        ];
    }
}
