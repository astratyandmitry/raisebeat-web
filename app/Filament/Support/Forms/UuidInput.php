<?php

namespace App\Filament\Support\Forms;

use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Operation;

final class UuidInput
{
    public static function make(): TextInput
    {
        return TextInput::make('uuid')
            ->label('UUID')
            ->visibleOn(Operation::Edit)
            ->columnSpanFull()
            ->disabled()
            ->required();
    }
}
