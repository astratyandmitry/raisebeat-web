<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Schemas;

use App\Filament\Support\Forms\LocationFieldsGrid;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\Region;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;

final class FoundForm
{
    public static function fields(): array
    {
        return [
            Fieldset::make('Found')
                ->columns(1)
                ->schema([
                    LocationFieldsGrid::make(),

                    Grid::make(3)
                        ->schema([
                            Select::make('focus_region')
                                ->required()
                                ->options(Region::getOptions()),
                            Select::make('investment_model')
                                ->required()
                                ->options(InvestmentModel::getOptions()),
                            TextInput::make('founded_year')
                                ->required()
                                ->numeric()
                                ->minValue(2000)
                                ->maxValue(date('Y')),
                        ]),

                    Fieldset::make('Check')
                        ->columns(2)
                        ->schema([
                            TextInput::make('check_size_min')
                                ->label('Min size')
                                ->numeric(),
                            TextInput::make('check_size_max')
                                ->label('Max size')
                                ->numeric(),
                        ]),

                    Fieldset::make('Config')->columns(3)
                        ->schema([
                            Toggle::make('is_lead_investor')
                                ->label('Lead Investor'),
                            Toggle::make('is_follow_investor')
                                ->label('Follow Investor'),
                            Toggle::make('is_public')
                                ->label('Public'),
                        ]),
                ]),
        ];
    }
}
