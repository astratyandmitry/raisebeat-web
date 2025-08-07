<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Schemas;

use App\Models\Enums\Country;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\Region;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

final class FoundForm
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
                TextInput::make('slug')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('headline'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('logo_url'),
                TextInput::make('contact_website'),
                TextInput::make('contact_email')
                    ->email(),
                TextInput::make('contact_phone')
                    ->tel(),
                TextInput::make('founded_year')
                    ->required()
                    ->numeric(),
                TextInput::make('check_size_min')
                    ->numeric(),
                TextInput::make('check_size_max')
                    ->numeric(),
                Select::make('focus_region')
                    ->options(Region::class)
                    ->required(),
                Select::make('investment_model')
                    ->options(InvestmentModel::class)
                    ->required(),
                Select::make('country')
                    ->options(Country::class)
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('count_viewed')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_lead_investor')
                    ->required(),
                Toggle::make('is_follow_investor')
                    ->required(),
                Toggle::make('is_public')
                    ->required(),
            ]);
    }
}
