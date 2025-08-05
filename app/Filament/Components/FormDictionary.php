<?php

declare(strict_types=1);

namespace App\Filament\Components;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FormDictionary
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->schema([
                        Grid::make()->schema([
                            TextInput::make('uuid')
                                ->label('UUID')
                                ->disabled()
                                ->visibleOn('edit')
                                ->required(),
                            TextInput::make('key')
                                ->disabledOn('edit')
                                ->required(),
                        ]),
                    ]),

                FormTranslatableField::make('name', 'Name'),

                Checkbox::make('is_active')
                    ->visibleOn('create'),
            ]);
    }
}
