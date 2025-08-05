<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors\Schemas;

use App\Models\Enums\Region;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class InvestorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('uuid')
                    ->label('UUID')
                    ->required(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('check_size_min')
                    ->numeric(),
                TextInput::make('check_size_max')
                    ->numeric(),
                TextInput::make('focus_headline')
                    ->required(),
                Select::make('focus_region')
                    ->options(Region::class)
                    ->required(),
                TextInput::make('count_viewed')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
