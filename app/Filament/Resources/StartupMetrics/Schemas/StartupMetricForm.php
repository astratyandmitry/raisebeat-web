<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupMetrics\Schemas;

use App\Filament\Support\Forms\StartupSelect;
use App\Filament\Support\Forms\UuidInput;
use App\Filament\Support\Forms\YearQuarterSelectGroup;
use App\Models\Enums\MetricType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

final class StartupMetricForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                UuidInput::make(),
                StartupSelect::make()->required(),
                YearQuarterSelectGroup::make(),

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
