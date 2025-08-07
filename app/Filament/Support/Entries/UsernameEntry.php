<?php

namespace App\Filament\Support\Entries;

use App\Filament\Resources\Users\UserResource;
use App\Models\Contracts\RelaterToUser;
use Filament\Infolists\Components\TextEntry;

final class UsernameEntry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('user.username')
            ->label('Author')
            ->color('primary')
            ->openUrlInNewTab()
            ->url(fn(RelaterToUser $record) => UserResource::getUrl('view', [$record]))
            ->state(fn(RelaterToUser $record) => "@{$record->user->username}");
    }
}
