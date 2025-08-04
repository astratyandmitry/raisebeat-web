<?php

namespace App\Filament\Resources\StartupCategories\Pages;

use App\Filament\Resources\StartupCategories\StartupCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStartupCategory extends CreateRecord
{
    protected static string $resource = StartupCategoryResource::class;
}
