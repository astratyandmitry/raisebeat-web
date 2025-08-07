<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use BackedEnum;

final class Dashboard extends \Filament\Pages\Dashboard
{
    protected static string|BackedEnum|null $navigationIcon = null;
}
