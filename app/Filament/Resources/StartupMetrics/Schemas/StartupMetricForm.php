<?php

namespace App\Filament\Resources\StartupMetrics\Schemas;

use App\Filament\Support\Helpers\YearsList;
use App\Models\Enums\MetricType;
use App\Models\Enums\Quarter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;

final class StartupMetricForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->disabled()
                    ->columnSpanFull()
                    ->visibleOn(Operation::Edit)
                    ->required(),

                Select::make('startup_id')
                    ->columnSpanFull()
                    ->native(false)
                    ->relationship('startup', 'name')
                    ->required(),

                Grid::make(2)
                    ->schema([
                        Select::make('year')
                            ->options(YearsList::generate())
                            ->required(),
                        Select::make('quarter')
                            ->options(Quarter::getOptions())
                            ->required(),
                    ]),

                Grid::make(2)
                    ->schema([
                        Select::make('type')
                            ->options(MetricType::getOptions())
                            ->required(),
                        TextInput::make('value')
                            ->label('Value')
                            ->required()
                            ->minValue(1)
                            ->numeric(),
                    ]),
            ]);
    }
}
