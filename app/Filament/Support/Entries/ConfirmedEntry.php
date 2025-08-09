<?php

declare(strict_types=1);

namespace App\Filament\Support\Entries;

use Filament\Infolists\Components\IconEntry;

final class ConfirmedEntry
{
    public static function make(): IconEntry
    {
        return IconEntry::make('is_confirmed')
            ->label('Confirmed')
            ->boolean();
    }
}
