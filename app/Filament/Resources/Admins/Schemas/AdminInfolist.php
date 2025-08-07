<?php

namespace App\Filament\Resources\Admins\Schemas;

use App\Filament\Support\Entries\DatesFieldsetEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class AdminInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->columns(1)
            ->components([
                TextEntry::make('uuid')->label('UUID'),
                TextEntry::make('name'),
                TextEntry::make('email'),

                DatesFieldsetEntry::make(),
            ]);
    }
}
