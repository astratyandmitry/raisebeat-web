<?php

declare(strict_types=1);

namespace App\Filament\Support\Filters;

use Filament\Tables\Filters\TernaryFilter;

final class ConfirmedFilter
{
    public static function make(): TernaryFilter
    {
        return TernaryFilter::make('is_confirmed')->label('Confirmed');
    }
}
