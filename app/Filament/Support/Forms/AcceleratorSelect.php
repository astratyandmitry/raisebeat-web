<?php

declare(strict_types=1);

namespace App\Filament\Support\Forms;

use Filament\Forms\Components\Select;

final class AcceleratorSelect
{
    public static function make(): Select
    {
        return Select::make('accelerator_id')
            ->relationship('accelerator', 'name')
            ->native(false)
            ->searchable();
    }
}
