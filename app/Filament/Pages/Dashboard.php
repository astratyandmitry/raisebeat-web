<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;

final class Dashboard extends \Filament\Pages\Dashboard
{
    protected static string | BackedEnum | null $navigationIcon = null;
}
