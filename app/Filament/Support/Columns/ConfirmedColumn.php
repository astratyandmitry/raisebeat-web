<?php

declare(strict_types=1);

namespace App\Filament\Support\Columns;

use Filament\Tables\Columns\IconColumn;

final class ConfirmedColumn
{
    public static function make(): IconColumn
    {
        return IconColumn::make('is_confirmed')
            ->label('Confirmed')
            ->width(40)
            ->alignCenter()
            ->boolean();
    }
}
