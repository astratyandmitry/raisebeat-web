<?php

namespace App\Filament\Support\Filters;

use Filament\Tables\Filters\SelectFilter;

final class StartupFilter
{
    public static function make(): SelectFilter
    {
        return SelectFilter::make('startup_id')
            ->relationship('startup', 'name')
            ->label('Startup')
            ->searchable()
            ->native(false);
    }
}
