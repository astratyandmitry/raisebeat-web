<?php

declare(strict_types=1);

namespace App\Filament\Support\Entries;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class DatesFieldset
{
    public static function make(bool $hasDeletedAt = true): Fieldset
    {
        return Fieldset::make('Dates')
            ->inlineLabel(false)
            ->columns($hasDeletedAt ? 3 : 2)
            ->schema([
                TextEntry::make('created_at')
                    ->label('Created')
                    ->dateTime('Y-m-d H:i'),
                TextEntry::make('updated_at')
                    ->label('Updated')
                    ->dateTime('Y-m-d H:i'),
                TextEntry::make('deleted_at')
                    ->label('Deleted')
                    ->dateTime('Y-m-d H:i')
                    ->placeholder('None')
                    ->visible($hasDeletedAt),
            ]);
    }
}
