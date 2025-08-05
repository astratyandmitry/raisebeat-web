<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('email_verified_at')
                    ->dateTime(),
                TextEntry::make('first_name'),
                TextEntry::make('last_name'),
                TextEntry::make('username'),
                TextEntry::make('headline'),
                TextEntry::make('avatar_url'),
                TextEntry::make('country'),
                TextEntry::make('city'),
                TextEntry::make('timezone'),
                TextEntry::make('language'),
                IconEntry::make('is_blocked')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
