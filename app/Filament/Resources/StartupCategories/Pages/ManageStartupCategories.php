<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupCategories\Pages;

use App\Filament\Resources\StartupCategories\StartupCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

final class ManageStartupCategories extends ManageRecords
{
    protected static string $resource = StartupCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create'),
        ];
    }
}
