<?php

namespace App\Filament\Resources\StartupVacancies\Pages;

use App\Filament\Resources\StartupVacancies\StartupVacancyResource;
use Filament\Resources\Pages\ListRecords;

final class ManageStartupVacancies extends ListRecords
{
    protected static string $resource = StartupVacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
