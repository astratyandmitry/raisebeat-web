<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Schemas;

use App\Models\Enums\VacancyType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StartupVacancyForm
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
                Select::make('type')
                    ->options(VacancyType::class)
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('feedback_email')
                    ->email()
                    ->required(),
                TextInput::make('count_views')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_applicable')
                    ->required(),
            ]);
    }
}
