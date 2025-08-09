<?php

namespace App\Filament\Resources\Investments\Schemas;

use App\Filament\Support\Forms\StartupSelect;
use App\Filament\Support\Forms\UuidInput;
use App\Filament\Support\Forms\YearQuarterSelectGroup;
use App\Models\Accelerator;
use App\Models\Found;
use App\Models\Investor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;

final class InvestmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                UuidInput::make(),
                StartupSelect::make()->required(),
                YearQuarterSelectGroup::make(),

                Fieldset::make('Investment')
                    ->columns(3)
                    ->schema([
                        UuidInput::make(),
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
                            ->label('Investor')
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

                        TextInput::make('amount_usd')
                            ->label('Amount USD')
                            ->required()
                            ->minValue(1)
                            ->numeric(),
                    ]),
            ]);
    }
}
