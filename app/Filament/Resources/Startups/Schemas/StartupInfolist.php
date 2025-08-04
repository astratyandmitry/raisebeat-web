<?php

namespace App\Filament\Resources\Startups\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StartupInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('slug'),
                TextEntry::make('name'),
                TextEntry::make('headline'),
                TextEntry::make('logo_url'),
                TextEntry::make('contact_website'),
                TextEntry::make('contact_email'),
                TextEntry::make('contact_phone'),
                TextEntry::make('market_problem'),
                TextEntry::make('market_solution'),
                TextEntry::make('market_region'),
                TextEntry::make('country'),
                TextEntry::make('city'),
                TextEntry::make('founded_year')
                    ->numeric(),
                TextEntry::make('business_model'),
                TextEntry::make('stage'),
                TextEntry::make('fundraising_status'),
                TextEntry::make('fundraising_round'),
                TextEntry::make('team_size'),
                TextEntry::make('demo_url'),
                TextEntry::make('deck_url'),
                IconEntry::make('is_demo_private')
                    ->boolean(),
                IconEntry::make('is_deck_private')
                    ->boolean(),
                IconEntry::make('is_public')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
