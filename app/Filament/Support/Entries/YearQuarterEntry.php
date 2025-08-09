<?php

namespace App\Filament\Support\Entries;

use App\Models\Abstracts\Model;
use Filament\Infolists\Components\TextEntry;

final class YearQuarterEntry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('year')
            ->label('Period')
            ->formatStateUsing(fn(Model $record) => "{$record->year}, {$record->quarter->getLabel()}");
    }
}
