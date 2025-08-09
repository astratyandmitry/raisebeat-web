<?php

declare(strict_types=1);

namespace App\Filament\Resources\Admins\Schemas;

use App\Filament\Support\Forms\UuidInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Operation;

final class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                UuidInput::make()->columnSpanFull(),

                TextInput::make('name')
                    ->maxLength(80)
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->maxLength(80)
                    ->unique()
                    ->required(),

                // Create
                TextInput::make('password')
                    ->password()
                    ->minLength(8)
                    ->hiddenOn(Operation::Edit)
                    ->columnSpanFull()
                    ->required(),

                // Update
                TextInput::make('new_password')
                    ->hiddenOn(Operation::Create)
                    ->minLength(8)
                    ->password()
                    ->confirmed(),
                TextInput::make('new_password_confirmation')
                    ->hiddenOn(Operation::Create)
                    ->minLength(8)
                    ->password()
                    ->requiredWith('new_password'),
            ]);
    }
}
