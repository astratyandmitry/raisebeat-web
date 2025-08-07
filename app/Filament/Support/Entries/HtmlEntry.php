<?php

namespace App\Filament\Support\Entries;

use App\Models\Abstracts\Model;
use Filament\Infolists\Components\TextEntry;

final class HtmlEntry
{
    public static function make(string $name): TextEntry
    {
        return TextEntry::make($name)
            ->formatStateUsing(fn(Model $record) => nl2br($record->getAttribute($name)))
            ->html();
    }
}
