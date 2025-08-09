<?php

namespace App\Filament\Support\Columns;

use Filament\Tables\Columns\TextColumn;

final class DateColumn
{
    public static function make(string $key = 'created_at', string $label = 'Created'): TextColumn
    {
        return TextColumn::make($key)
            ->label($label)
            ->width(80)
            ->dateTime('Y-m-d H:i')
            ->sortable();
    }
}
