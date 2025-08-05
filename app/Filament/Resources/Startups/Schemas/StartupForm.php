<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups\Schemas;

use App\Models\Enums\BusinessModel;
use App\Models\Enums\Country;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\Region;
use App\Models\Enums\StartupStage;
use App\Models\Enums\TeamSize;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StartupForm
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
                TextInput::make('market_problem')
                    ->required(),
                TextInput::make('market_solution')
                    ->required(),
                Select::make('market_region')
                    ->options(Region::class)
                    ->required(),
                Select::make('country')
                    ->options(Country::class)
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('founded_year')
                    ->required()
                    ->numeric(),
                Select::make('business_model')
                    ->options(BusinessModel::class)
                    ->required(),
                Select::make('stage')
                    ->options(StartupStage::class)
                    ->required(),
                Select::make('fundraising_status')
                    ->options(FundraisingStatus::class)
                    ->required(),
                Select::make('fundraising_round')
                    ->options(FundraisingRound::class),
                Select::make('team_size')
                    ->options(TeamSize::class)
                    ->required(),
                TextInput::make('demo_url'),
                TextInput::make('deck_url'),
                Toggle::make('is_demo_private')
                    ->required(),
                Toggle::make('is_deck_private')
                    ->required(),
                Toggle::make('is_public')
                    ->required(),
            ]);
    }
}
