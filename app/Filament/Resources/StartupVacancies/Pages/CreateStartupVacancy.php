<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Pages;

use App\Filament\Resources\StartupVacancies\StartupVacancyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStartupVacancy extends CreateRecord
{
    protected static string $resource = StartupVacancyResource::class;
}
