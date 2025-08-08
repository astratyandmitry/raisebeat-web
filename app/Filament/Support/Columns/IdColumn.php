<?php

namespace App\Filament\Support\Columns;

use Filament\Tables\Columns\TextColumn;

final class IdColumn
{
    public static function make(): TextColumn
    {
        return TextColumn::make('id')
            ->searchable(['id', 'uuid'])
            ->width(50)
            ->label('ID');
    }
}
