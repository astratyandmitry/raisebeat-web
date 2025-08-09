<?php

declare(strict_types=1);

namespace App\Filament\Support\Entries;

use Filament\Infolists\Components\TextEntry;

final class UuidEntry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('uuid')->label('UUID');
    }
}
