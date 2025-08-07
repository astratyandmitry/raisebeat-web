<?php

declare(strict_types=1);

namespace App\Filament\Support\Columns;

use App\Models\Contracts\RelaterToUser;
use Filament\Tables\Columns\TextColumn;

final class UsernameColumn
{
    public static function make(): TextColumn
    {
        return TextColumn::make('user.username')
            ->width(240)
            ->label('Author')
            ->formatStateUsing(fn (RelaterToUser $record): string => "@{$record->user->username}");
    }
}
