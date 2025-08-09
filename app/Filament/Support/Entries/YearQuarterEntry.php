<?php

declare(strict_types=1);

namespace App\Filament\Support\Entries;

use App\Models\Abstracts\Model;
use Filament\Infolists\Components\TextEntry;

final class YearQuarterEntry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('year')
            ->label('Period')
            ->formatStateUsing(fn (Model $record): string => "{$record->year}, {$record->quarter->getLabel()}");
    }
}
