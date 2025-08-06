<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupIndustries;

use App\Filament\Components\BaseDictionaryResource;
use App\Filament\Resources\StartupIndustries\Pages\ManageStartupIndustries;
use App\Models\Dictionaries\StartupIndustry;

final class StartupIndustryResource extends BaseDictionaryResource
{
    protected static ?string $model = StartupIndustry::class;

    public static function getPages(): array
    {
        return [
            'index' => ManageStartupIndustries::route('/'),
        ];
    }
}
