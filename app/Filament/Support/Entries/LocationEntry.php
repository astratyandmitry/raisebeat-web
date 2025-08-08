<?php

declare(strict_types=1);

namespace App\Filament\Support\Entries;

use App\Models\Abstracts\Model;
use Filament\Infolists\Components\TextEntry;

final class LocationEntry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('city')
            ->label('Location')
            ->formatStateUsing(fn (Model $record): string => "{$record->city}, {$record->country->getLabel()}");
    }
}
