<?php

declare(strict_types=1);

namespace App\Filament\Support\Forms;

use Filament\Forms\Components\Select;

final class StartupSelect
{
    public static function make(): Select
    {
        return Select::make('startup_id')
            ->relationship('startup', 'name')
            ->native(false)
            ->searchable();
    }
}
