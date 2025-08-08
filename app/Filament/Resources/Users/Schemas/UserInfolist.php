<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use App\Filament\Support\Entries\DatesFieldsetEntry;
use App\Filament\Support\Entries\HtmlEntry;
use App\Models\User;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->inlineLabel()
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                ImageEntry::make('avatar_url')
                    ->label('Avatar')
                    ->circular(),

                TextEntry::make('full_name')
                    ->formatStateUsing(fn(User $record) => $record->getDisplayLabel()),
                TextEntry::make('username')
                    ->formatStateUsing(fn(User $record) => "@{$record->username}"),
                TextEntry::make('headline')
                    ->visible(fn(User $record) => ! empty($record->headline)),
                HtmlEntry::make('bio'),
                TextEntry::make('city')
                    ->label('Location')
                    ->formatStateUsing(fn(User $record) => "{$record->city}, {$record->country->getLabel()}"),

                Fieldset::make('Email')
                    ->columns(2)
                    ->inlineLabel(false)
                    ->schema([
                        TextEntry::make('email')
                            ->label('Email address'),
                        TextEntry::make('email_verified_at')
                            ->label('Email verified')
                            ->placeholder('Not verified')
                            ->dateTime('Y-m-d H:i'),
                    ]),

                Fieldset::make('Settings')
                    ->columns(2)
                    ->inlineLabel(false)
                    ->schema([
                        TextEntry::make('timezone'),
                        TextEntry::make('language'),
                    ]),

                DatesFieldsetEntry::make(),
            ]);
    }
}
