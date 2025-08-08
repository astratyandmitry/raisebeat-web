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
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;

final class StartupForm
{
    public static function fields(): array
    {
        return [
            Fieldset::make('Startup')
                ->columns(1)
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Select::make('country')
                                ->options(Country::getOptions())
                                ->required(),

                            TextInput::make('city')
                                ->maxlength(40)
                                ->required(),
                        ]),

                    TextInput::make('founded_year')
                        ->required()
                        ->numeric()
                        ->minValue(2000)
                        ->maxValue(date('Y')),

                    Fieldset::make('Market')
                        ->columns(1)
                        ->schema([
                            Select::make('market_region')
                                ->required()
                                ->options(Region::getOptions())
                                ->label('Region'),
                            Textarea::make('market_problem')
                                ->autosize()
                                ->required()
                                ->maxLength(1000)
                                ->label('Problem'),
                            Textarea::make('market_solution')
                                ->autosize()
                                ->required()
                                ->maxLength(1000)
                                ->label('Solution'),
                        ]),

                    Fieldset::make('Data')
                        ->columns(2)
                        ->inlineLabel(false)
                        ->schema([
                            Select::make('business_model')
                                ->label('Model')
                                ->required()
                                ->options(BusinessModel::getOptions()),
                            Select::make('stage')
                                ->label('Status')
                                ->required()
                                ->options(StartupStage::getOptions()),
                            Select::make('fundraising_status')
                                ->label('Status')
                                ->required()
                                ->options(FundraisingStatus::getOptions()),
                            Select::make('fundraising_round')
                                ->label('Round')
                                ->options(FundraisingRound::getOptions()),
                            Select::make('team_size')
                                ->label('Team')
                                ->required()
                                ->options(TeamSize::getOptions()),
                        ]),
                ]),

            Fieldset::make('URLs')
                ->columns(1)
                ->schema([
                    TextInput::make('demo_url')
                        ->maxLength(500)
                        ->activeUrl()
                        ->placeholder('https://example.com/some-uri')
                        ->label('Demo'),
                    TextInput::make('deck_url')
                        ->maxLength(500)
                        ->activeUrl()
                        ->placeholder('https://example.com/some-uri')
                        ->label('Deck'),
                ]),

            Fieldset::make('Access')
                ->columns(3)
                ->inlineLabel(false)
                ->schema([
                    Toggle::make('is_demo_private')
                        ->label('Demo Private'),
                    Toggle::make('is_deck_private')
                        ->label('Deck Private'),
                    Toggle::make('is_public')
                        ->label('Public'),
                ]),
        ];
    }
}
