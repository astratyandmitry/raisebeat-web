<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupCategories\Pages;

use App\Filament\Resources\StartupCategories\StartupCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ManageStartupCategories extends ListRecords
{
    protected static string $resource = StartupCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create'),
        ];
    }
}
