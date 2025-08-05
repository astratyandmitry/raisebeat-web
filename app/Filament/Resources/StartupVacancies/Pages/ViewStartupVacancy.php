<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Pages;

use App\Filament\Resources\StartupVacancies\StartupVacancyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStartupVacancy extends ViewRecord
{
    protected static string $resource = StartupVacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
