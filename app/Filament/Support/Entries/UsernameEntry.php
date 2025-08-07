<?php

declare(strict_types=1);

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
            ->url(fn (RelaterToUser $record): string => UserResource::getUrl('view', [$record]))
            ->state(fn (RelaterToUser $record): string => "@{$record->user->username}");
    }
}
