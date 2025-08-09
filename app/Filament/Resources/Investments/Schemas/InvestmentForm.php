<?php

namespace App\Filament\Resources\Investments\Schemas;

use App\Filament\Support\Helpers\YearsList;
use App\Models\Accelerator;
use App\Models\Enums\Quarter;
use App\Models\Found;
use App\Models\Investor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;
use Illuminate\Support\Collection;

final class InvestmentForm
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
                    ->searchable()
                    ->relationship('startup', 'name')
                    ->required(),

                Grid::make(3)
                    ->schema([
                        Select::make('year')
                            ->options(YearsList::generate())
                            ->required(),
                        Select::make('quarter')
                            ->options(Quarter::getOptions())
                            ->required(),
                        TextInput::make('amount_usd')
                            ->label('Amount USD')
                            ->required()
                            ->minValue(1)
                            ->numeric(),
                    ]),

                Fieldset::make('Investor')
                    ->columns(2)
                    ->schema([
                        Select::make('investable_type')
                            ->label('Type')
                            ->native(false)
                            ->options([
                                'founds' => 'Found',
                                'accelerators' => 'Accelerator',
                                'investors' => 'Investor',
                            ])
                            ->required()
                            ->live(),

                        Select::make('investable_id')
                            ->label('Entity')
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->options(function (Get $get): ?Collection {
                                return match ($get('investable_type')) {
                                    'founds' => Found::query()->pluck('name', 'id'),
                                    'investors' => Investor::query()->pluck('name', 'id'),
                                    'accelerators' => Accelerator::query()->pluck('name', 'id'),
                                    default => null,
                                };
                            }),
                    ]),
            ]);
    }
}
