<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use App\Models\Enums\Country;
use App\Models\Enums\Language;
use App\Models\Enums\Timezone;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

final class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                TextInput::make('headline'),
                Textarea::make('bio')
                    ->columnSpanFull(),
                TextInput::make('avatar_url'),
                Select::make('country')
                    ->options(Country::class),
                TextInput::make('city'),
                Select::make('timezone')
                    ->options(Timezone::class)
                    ->required(),
                Select::make('language')
                    ->options(Language::class)
                    ->required(),
                Toggle::make('is_blocked')
                    ->required(),
            ]);
    }
}
