<?php

namespace App\Filament\Support\Entries;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class DatesFieldsetEntry
{
    public static function make(bool $hasDeletedAt = true): Fieldset
    {
        return Fieldset::make('Dates')
            ->inlineLabel(false)
            ->columns($hasDeletedAt ? 3 : 2)
            ->schema([
                TextEntry::make('created_at')
                    ->dateTime('Y-m-d H:i'),
                TextEntry::make('updated_at')
                    ->dateTime('Y-m-d H:i'),
                TextEntry::make('deleted_at')
                    ->dateTime('Y-m-d H:i')
                    ->placeholder('None')
                    ->visible($hasDeletedAt),
            ]);
    }
}
