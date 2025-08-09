<?php

namespace App\Filament\Support\Columns;

use App\Models\Abstracts\Model;
use Filament\Tables\Columns\TextColumn;

final class YearQuarterColumn
{
    public static function make(): TextColumn
    {
        return TextColumn::make('year')
            ->width(80)
            ->label('Period')
            ->description(fn(Model $record) => $record->quarter->getLabel())
            ->sortable(['year', 'quarter']);
    }
}
