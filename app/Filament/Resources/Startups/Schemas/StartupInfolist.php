<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups\Schemas;

use App\Filament\Support\Entries\HtmlEntry;
use App\Models\Startup;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class StartupInfolist
{
    public static function entries(): array
    {
        return [
            Fieldset::make('Startup')
                ->columns(1)
                ->schema([
                    TextEntry::make('city')
                        ->label('Location')
                        ->formatStateUsing(fn(Startup $record) => "{$record->city}, {$record->country->getLabel()}"),
                    TextEntry::make('founded_year')->numeric(),

                    Fieldset::make('Market')
                        ->columns(1)
                        ->schema([
                            TextEntry::make('market_region')
                                ->label('Region')
                                ->color('gray')
                                ->badge(),
                            HtmlEntry::make('market_problem')
                                ->label('Problem'),
                            HtmlEntry::make('market_solution')
                                ->label('Solution'),
                        ]),

                    Fieldset::make('Data')
                        ->columns(3)
                        ->inlineLabel(false)
                        ->schema([
                            TextEntry::make('business_model')
                                ->label('Model')
                                ->color('gray')
                                ->badge(),
                            TextEntry::make('stage')
                                ->badge(),
                            TextEntry::make('team_size')
                                ->label('Team')
                                ->color('gray')
                                ->badge(),
                            TextEntry::make('fundraising_status')
                                ->label('Status')
                                ->badge(),
                            TextEntry::make('fundraising_round')
                                ->label('Round')
                                ->badge(),
                        ]),
                ]),

            Fieldset::make('URLs')
                ->columns(1)
                ->visible(fn(Startup $record) => ! empty($record->demo_url) || ! empty($record->deck_url))
                ->schema([
                    TextEntry::make('demo_url')
                        ->label('Demo')
                        ->visible(fn(Startup $record) => ! empty($record->demo_url)),
                    TextEntry::make('deck_url')
                        ->label('Deck')
                        ->visible(fn(Startup $record) => ! empty($record->deck_url)),
                ]),

            Fieldset::make('Access')
                ->columns(3)
                ->inlineLabel(false)
                ->schema([
                    IconEntry::make('is_demo_private')
                        ->label('Demo Private')
                        ->boolean(),
                    IconEntry::make('is_deck_private')
                        ->label('Deck Private')
                        ->boolean(),
                    IconEntry::make('is_public')
                        ->label('Public')
                        ->boolean(),
                ]),
        ];
    }
}
