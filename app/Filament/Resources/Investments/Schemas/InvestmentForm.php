<?php

namespace App\Filament\Resources\Investments\Schemas;

use App\Models\Enums\Quarter;
use App\Models\Investment;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

final class InvestmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                Select::make('startup_id')
                    ->relationship('startup', 'name')
                    ->required(),
                TextColumn::make('investable.name')
                    ->state(fn(Investment $record) => $record->investable->getDisplayLabel())
                    ->description(fn(Investment $record) => Str::title(Str::singular($record->investable_type)))
                    ->searchable(),
                TextInput::make('year')
                    ->required()
                    ->numeric(),
                Select::make('quarter')
                    ->options(Quarter::cases())
                    ->required(),
                TextInput::make('amount_usd')
                    ->required()
                    ->numeric(),
                Toggle::make('is_confirmed')
                    ->required(),
            ]);
    }
}
