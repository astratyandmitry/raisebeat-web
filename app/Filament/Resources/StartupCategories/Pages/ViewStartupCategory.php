<?php

namespace App\Filament\Resources\StartupCategories\Pages;

use App\Filament\Resources\StartupCategories\StartupCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStartupCategory extends ViewRecord
{
    protected static string $resource = StartupCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
