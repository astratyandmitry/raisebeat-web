<?php

declare(strict_types=1);

namespace App\Filament\Resources\Accelerators\Schemas;

use App\Filament\Support\Forms\LocationFieldsGrid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;

final class AcceleratorForm
{
    public static function fields(): array
    {
        return [
            Fieldset::make('Accelerator')
                ->columns(1)
                ->schema([
                    LocationFieldsGrid::make(),
                    TextInput::make('founded_year')
                        ->required()
                        ->numeric()
                        ->minValue(2000)
                        ->maxValue(date('Y')),
                    Toggle::make('is_public')->label('Public'),
                ]),
        ];
    }
}
