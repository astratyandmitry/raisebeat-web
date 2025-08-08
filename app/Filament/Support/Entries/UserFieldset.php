<?php

namespace App\Filament\Support\Entries;

use App\Models\Contracts\RelaterToUser;
use App\Models\Investor;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class UserFieldset
{
    public static function make(): Fieldset
    {
        return Fieldset::make('User')
            ->columns(1)
            ->schema([
                ImageEntry::make('user.avatar_url')
                    ->label('Avatar')
                    ->circular(),
                TextEntry::make('user.first_name')
                    ->formatStateUsing(fn(RelaterToUser $record) => $record->user->getDisplayLabel()),
                UsernameEntry::make(),
            ]);
    }
}
