<?php

namespace App\Filament\Support\Entries;

use App\Models\Abstracts\Model;
use Filament\Infolists\Components\TextEntry;

final class LocationEntry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('city')
            ->label('Location')
            ->formatStateUsing(fn(Model $record) => "{$record->city}, {$record->country->getLabel()}");
    }
}
