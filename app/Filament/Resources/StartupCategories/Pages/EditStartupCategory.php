<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupCategories\Pages;

use App\Filament\Resources\StartupCategories\StartupCategoryResource;
use Filament\Resources\Pages\EditRecord;

final class EditStartupCategory extends EditRecord
{
    protected static string $resource = StartupCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
