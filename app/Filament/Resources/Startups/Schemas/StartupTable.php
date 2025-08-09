<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups\Schemas;

use App\Filament\Support\Columns\LocationColumn;
use App\Models\Enums\BusinessModel;
use App\Models\Enums\Country;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\Region;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;

final class StartupTable
{
    public static function columns(): array
    {
        return [
            LocationColumn::make(),
            TextColumn::make('market_region')
                ->label('Market')
                ->width(80)
                ->color('gray')
                ->badge(),
            TextColumn::make('business_model')
                ->label('Model')
                ->width(80)
                ->color('gray')
                ->badge(),
            TextColumn::make('stage')
                ->width(80)
                ->badge(),
            TextColumn::make('fundraising_status')
                ->label('Status')
                ->width(80)
                ->badge(),
            TextColumn::make('fundraising_round')
                ->label('Round')
                ->width(80)
                ->badge(),
        ];
    }

    public static function filters(): array
    {
        return [
            SelectFilter::make('country')
                ->options(Country::getOptions()),
            SelectFilter::make('market_region')
                ->label('Market')
                ->options(Region::getOptions()),
            SelectFilter::make('business_model')
                ->label('Model')
                ->options(BusinessModel::getOptions()),
            SelectFilter::make('fundraising_status')
                ->label('Status')
                ->options(FundraisingStatus::getOptions()),
            SelectFilter::make('fundraising_round')
                ->label('Round')
                ->options(FundraisingRound::getOptions()),
        ];
    }
}
