<?php

namespace App\Filament\Resources\AcceleratorParticipants\Schemas;

use App\Filament\Support\Helpers\YearsList;
use App\Models\Enums\Quarter;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;

final class AcceleratorParticipantForm
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

                Grid::make(2)
                    ->schema([
                        Select::make('accelerator_id')
                            ->native(false)
                            ->searchable()
                            ->relationship('accelerator', 'name')
                            ->required(),

                        Select::make('startup_id')
                            ->native(false)
                            ->searchable()
                            ->relationship('startup', 'name')
                            ->required(),

                    ]),

                Grid::make(2)
                    ->schema([
                        Select::make('year')
                            ->options(YearsList::generate())
                            ->required(),
                        Select::make('quarter')
                            ->options(Quarter::getOptions())
                            ->required(),
                    ]),
            ]);
    }
}
