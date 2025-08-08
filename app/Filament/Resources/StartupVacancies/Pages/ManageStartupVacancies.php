<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Pages;

use App\Filament\Resources\StartupVacancies\StartupVacancyResource;
use Filament\Resources\Pages\ManageRecords;

final class ManageStartupVacancies extends ManageRecords
{
    protected static string $resource = StartupVacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
