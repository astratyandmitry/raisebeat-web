<?php

declare(strict_types=1);

namespace App\Filament\Support\Columns;

use App\Models\Abstracts\Model;
use Filament\Tables\Columns\TextColumn;

final class LocationColumn
{
    public static function make(): TextColumn
    {
        return TextColumn::make('city')
            ->label('Location')
            ->searchable(['country', 'city'])
            ->description(fn (Model $record) => $record->country->getLabel());
    }
}
