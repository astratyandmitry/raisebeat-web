<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupProductTypes;

use App\Filament\Components\BaseDictionaryResource;
use App\Filament\Resources\StartupProductTypes\Pages\ManageStartupProductTypes;
use App\Models\Dictionaries\StartupProductType;

final class StartupProductTypeResource extends BaseDictionaryResource
{
    protected static ?string $model = StartupProductType::class;

    public static function getPages(): array
    {
        return [
            'index' => ManageStartupProductTypes::route('/'),
        ];
    }
}
