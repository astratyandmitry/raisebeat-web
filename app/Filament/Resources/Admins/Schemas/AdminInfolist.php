<?php

namespace App\Filament\Resources\Admins\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class AdminInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->columns(1)
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),

                Fieldset::make('Dates')
                    ->inlineLabel(false)
                    ->columns(3)
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime('Y-m-d H:i'),
                        TextEntry::make('updated_at')
                            ->dateTime('Y-m-d H:i'),
                        TextEntry::make('deleted_at')
                            ->placeholder('None')
                            ->dateTime(),
                    ]),
            ]);
    }
}
