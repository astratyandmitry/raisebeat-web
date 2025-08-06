<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupTechnologies;

use App\Filament\Components\BaseDictionaryResource;
use App\Filament\Resources\StartupTechnologies\Pages\ManageStartupTechnologies;
use App\Models\Dictionaries\StartupTechnology;

final class StartupTechnologyResource extends BaseDictionaryResource
{
    protected static ?string $model = StartupTechnology::class;

    protected static ?string $navigationLabel = 'Technologies';

    public static function getPages(): array
    {
        return [
            'index' => ManageStartupTechnologies::route('/'),
        ];
    }
}
