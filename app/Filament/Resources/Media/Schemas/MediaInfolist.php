<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MediaInfolist
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
                TextEntry::make('type'),
                TextEntry::make('submission_url'),
                TextEntry::make('count_viewed')
                    ->numeric(),
                IconEntry::make('is_public')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
