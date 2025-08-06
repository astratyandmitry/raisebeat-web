<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupCategories;

use App\Filament\Components\BaseDictionaryResource;
use App\Filament\Resources\StartupCategories\Pages\ManageStartupCategories;
use App\Models\Dictionaries\StartupCategory;

final class StartupCategoryResource extends BaseDictionaryResource
{
    protected static ?string $model = StartupCategory::class;

    public static function getPages(): array
    {
        return [
            'index' => ManageStartupCategories::route('/'),
        ];
    }
}
